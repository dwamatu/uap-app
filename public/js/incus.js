function S(url,Uname ,UID, page) {
    this.MAXRETRIES   = 3;
    this.socketRetries = 0;
    this.pollRetries   = 0;
    this.url          = url;
    this.Uname         = Uname;
    this.UID          = UID;
    this.page         = page;
    this.onMessageCbs = {};
    this.connectedCb  = false;
    this.socket          = null;
    this.poll            = null;
    this.connected       = false;
    this.socketConnected = false;
    this.connect();
}

S.prototype.longpoll = function(command) {
    if(this.socketConnected) { return; }

    if(this.poll != null) {
        this.poll.abort();
    }

    this.poll = new XMLHttpRequest();

    var data = {'user': this.UID};
    if(this.page) {
        data['page'] = this.page;
    }

    if(typeof command != 'undefined') {
        data['command'] = command;
    }

    var query_string = this.serialize(data);

    var self = this;
    this.poll.onreadystatechange = function() {
        if(self.poll.readyState === 4) {
            var response = {
                'data'   : self.poll.responseText,
                'status' : self.poll.status,
                'success': true
            };

            if(self.poll.status !== 0 && self.pollRetries < self.MAXRETRIES) {
                self.longpoll();
            }

            if(response.status !== 200 && response.status !== 0) {
                self.pollRetries++;
            }

            if(response.status === 200 && response.data !== "") {
                self.onMessage(response);
            }
        }
    };

    this.poll.open("GET", this.url+'/lp'+query_string, true);
    this.poll.timeout = 0;
    this.poll.send();

    this.connected = true;

    if(!this.connectedCb && "connect" in this.onMessageCbs) {
        this.connectedCb = true;
        this.onMessageCbs["connect"].call(null);
    }
};

S.prototype.connect = function() {
    this.longpoll();

    if("WebSocket" in window) {
        this.connectSocket();
    }
};

S.prototype.connectSocket = function() {
    var url = this.url.replace("https", "wss").replace("http", "ws");
    this.socket = new WebSocket(url+'/socket');

    var self = this;
    this.socket.onopen    = function()  { self.authenticate() };
    this.socket.onmessage = function(e) { self.onMessage(e) };
    this.socket.onclose   = function()  { self.onClose() };
};

S.prototype.newCommand = function(command, message) {
    message['time'] = Math.round(new Date().getTime() / 1000);
    var obj = {
        "command": command,
        "message": message,
    };

    return JSON.stringify(obj);
};

S.prototype.authenticate = function() {
    this.socketConnected = true;
    this.poll.abort();

    var message = this.newCommand({'command': "authenticate", 'user': this.UID}, {});

    this.socket.send(message);

    if(this.page) {
        this.setPage(this.page);
    }

    if(!this.connectedCb && "connect" in this.onMessageCbs) {
        this.connectedCb = true;
        this.onMessageCbs["connect"].call(null);
    }

    this.connected = true;
};

S.prototype.on = function(uname, name, func) {
    if(name == 'connect' && this.Uname == uname && this.connected) {
        this.connectedCb = true;
        func();
    }

    this.onMessageCbs[name] = func;
}

S.prototype.onMessage = function(e) {
    if(e.data === "") {
        this.socketRetries = 0;
        return;
    }

    var msg = JSON.parse(e.data);

    if("event" in msg && msg.event in this.onMessageCbs) {
        if(typeof this.onMessageCbs[msg.event] == "function") {
            this.onMessageCbs[msg.event].call(null, msg.data);
        }
    }
};

S.prototype.onClose = function() {
    if(this.socketRetries > this.MAXRETRIES) {
        return;
    }

    this.socketRetries++;
    this.connected = false;

    var self = this;
    window.setTimeout(function() {

        self.connectSocket();
    }, 1000);
};

S.prototype.MessageUser = function(event, UID, data) {
    var command = {"command": "message", "user": UID};
    var message = {"event": event, "data": data};

    var msg = this.newCommand(command, message);
    return this.send(msg);
};

S.prototype.MessagePage = function(event, page, data) {
    var command = {"command": "message", "page": page};
    var message = {"event": event, "data": data};

    var msg = this.newCommand(command, message);
    return this.send(msg);
};

S.prototype.MessageAll = function(event, data) {
    var command = {"command": "message"};
    var message = {"event": event, "data": data};

    var msg = this.newCommand(command, message);
    return this.send(msg);
};

S.prototype.setPage = function(page) {
    this.page   = page;

    if(this.socketConnected) {
        var command = {'command': 'setpage', 'page': page};

        var msg = this.newCommand(command, {});
        return this.send(msg);
    }

    this.send();
};

S.prototype.serialize = function(obj) {
    var str = [];

    for(var p in obj){
        if(obj.hasOwnProperty(p)) {
            str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
    }
    return '?'+str.join("&");
};

S.prototype.send = function(command) {
    if(this.socketConnected) {
        this.socket.send(command);
    } else {
        this.longpoll(command);
    }
};