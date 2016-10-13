<?php

namespace App\Http\Controllers;

use App\LossCalculation;

use DB;

use Dompdf\Dompdf;




class LossCalculationController extends Controller
{
    public function getLossCalculations()
    {
        $loss_calculations = LossCalculation::all();


        return view('loss.calculation.calculation', ['loss_calculations' => $loss_calculations]);
    }

    public function downloadLossAssessment($assessment_id)
    {


// instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $loss_html = $this->makeLossAssessmentnote($assessment_id);
        $dompdf->loadHtml($loss_html);

// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF to Browser
        $dompdf->stream('Loss Assessment Report',array('Attachment'=>0));
    }

    public function makeLossAssessmentnote($assessment_id)
    {
        $assessment = LossCalculation::where('id',$assessment_id)->first();
        $the_style = '<style>
                                @page {
                                    margin: 0.9%;
                                    font-family: CenturyGothic !important;
                                }
                                td {
                                    font-size: 80%;
                               
                                }
                                p {
                                    font-size: 60%;
                                }
                                .bordered {
                                    border: 1px solid black;
                                    width: 100%;
                                    /*height: 100%;*/
                                }
                                 .ze_head {
                                    left:5%;
                                    padding: 5px;
                                    width:95%;
                                    /*position:absolute;*/
                                    margin: auto auto;
                                }
                                th {
                                    text-align:left;
                                }
                                .ze_first_table {
                                    border: 1px solid black;                        
                                    width:95%;
                                    /*position:absolute;*/
                                }
                                    table{
                                        empty-cells: show;
                                        width: 75%;
                                        font-size: x-small;
                                    }
                                    table td,
                                    table th {
                                        min-width: 2em;
                                min-height: 2em;
                                    }
                                    .my_footer{
                                    page-break-after: always;
        
                                }          

                                div > img{
                                   height:300px;
                                    width:300px;
                                }

                        </style>
                        ';
        $the_title = '<center><h2>LOSS ASSESSMENT REPORT</h2></center>';
        $the_header ='<table class="ze_head" border=1 cellspacing=0 cellpadding="4" align="center">
                            <tr style="background-color:#DFDFDF;">
                                <th colspan="4">A. FARMER DETAILS</th>
                            </tr>

    <tr>
        <td><b>Farmers Name</b></td>
        <td colspan="1">'. ($assessment->farmer->farmer_name).'</td>
        <td><b>ID no</b></td>
        <td>'. ($assessment->farmer->id_number).'</td>

    </tr>
    <tr>
        <td><b>Farmers Zone</b></td>
        <td colspan="1">'. ($assessment->farmer->farmer_zone).'</td>
        <td><b>A/C no</b></td>
        <td>'. ($assessment->farmer->account_number).'</td>

    </tr>
    <tr>
        <td><b>Staff Name</b></td>
        <td colspan="1">'. ($assessment->user->first_name).' '.($assessment->user->last_name).'</td>
         <td><b>Planting Dates</b></td>

        <td></td>

    </tr>


</table>';
        // <editor-fold defaultstate="collapsed" desc=" First Table ">



        // </editor-fold>
        $the_firsttable = '<table class="ze_head" border=1 cellspacing=0 cellpadding="5" align="center">
                            <tr style="background-color:#DFDFDF;">
                                <th colspan="4">B. INSPECTION DETAILS</th>
                            </tr>
                            <tr>
                                <th width="250px">Cause of loss:</th><td>' . $assessment->cause_of_loss_id . '</td>
                                <th width="250px">Inspection Number:</th><td></td>
                            </tr>
                            <tr>
                                <th>Size of Land:</th><td>' . ($assessment-> farm->size_with_tobacco) . ' Hectares</td>
                                <th>Inspection Date:</th><td>'. date('d-M-Y',strtotime($assessment->inspection_date)).'</td>
                            </tr>
                          
                        </table>';
        // </editor-fold>
        $the_secondtable = '<table class="ze_head" border=1 cellspacing=0 cellpadding="5" align="center">
                            <tr style="background-color:#DFDFDF;">
                                <th colspan="4">C. LOSS ASSESSMENT DETAILS</th>
                            </tr>
                            <tr>
                                <th width="250px">Farm Name:</th><td colspan="3">' . $assessment->farm_name . '</td>
                                
                            </tr>
                            <tr style="background-color:#DFDFDF;">
                                <th colspan="4">Leaf Damage(Damage on the surface area of the leaf quantified as % or given in cm<sup>2</sup>
            in case of drought</th>
                            </tr>
                            <tr>
                                 <th style=" text-indent: 30px;">Average useful surface area <b>(a)</b></th><td style=" text-indent: 80px;" colspan="3">'. ($assessment-> average_useful_sa).'</td>
                            
                            </tr>
                             <tr>
                               
                                <th style=" text-indent: 30px;">Normal leaf surface area <b>(b)</b></th><td style=" text-indent: 80px;"  colspan="3">'. ($assessment-> normal_leaf_sa).'</td>
                            </tr>
                              <tr style="background-color:#DFDFDF;">
                                <th colspan="4">Plant Damage(number of leaves damaged on the plant)</b></th>
                            </tr>
                            <tr>
                                 <th style=" text-indent: 30px;">Average no. of leaves on the plant <b>(c)</b></th> <td style=" text-indent: 80px;" colspan="3">'. ($assessment->average_leaves_no).'</td>
                            
                            </tr>
                             <tr>
                               
                                <th style=" text-indent: 30px;">Normal no. leaves on the plant <b>(d)</b></th><td style=" text-indent: 80px;"  colspan="3">'. ($assessment-> normal_leaves_no).'</td>
                            </tr>
                            </tr>
                              <tr style="background-color:#DFDFDF;">
                                <th colspan="4">Land damage (number of plants damaged on the land parcel)</th>
                            </tr>
                            <tr>
                                <th style=" text-indent: 30px;">Average no. of plants on the land <b>(e)</b></th><td style=" text-indent: 80px;"  colspan="3">'. ($assessment->average_plant_no).'</td>
                            
                            </tr>
                             <tr>
                               
                                 <th style=" text-indent: 30px;">Established no. of plants <b>(f)</b></th><td style=" text-indent: 80px;"  colspan="3">'. ($assessment-> established_plant_no).'</td>
                            </tr>
                            <tr>
                                <th>Percentage Loss (%)</th><td style=" text-indent: 80px;" colspan="3">'. ($assessment-> percentage_loss).'</td>
                            
                            </tr>
                            <tr>
                                <th>Leaf stage of the plant</th><td style=" text-indent: 80px;" colspan="3">'. ($assessment-> leaf_stage).'</td>
                            
                            </tr>
                            
                          
                        </table>
                         <br />
                                <div style="margin:10px auto;clear:both;">
                                    <span style="margin:auto auto;width:95%; display: block;"><strong>Good Agricultural Practices</strong> '. ($assessment->agricultural_practices).'</span>
                                    <br />
                                    <span style="margin:auto auto;width:95%; display: block;"><strong>Area Staff Comment:</strong> '. ($assessment->area_staff_comment).' <br> Signature: ____________________ Date: ________________</span>
                                    <br />
                                    <br />
                                    <span style="margin:auto auto;width:95%; display: block;"><strong>UAP Crop Inspector\'s Comment:</strong>______________________________________________________________________________________ <br> Signature: ____________________ Date: ________________</span>
                                    <br />
                                    <br />
                                    <span style="margin:auto auto;width:95%; display: block;"><strong>ALM Comment:</strong>______________________________________________________________________________________ <br> Signature: ____________________ Date: ________________</span>
                                    <br />
                                    <span style="margin:auto auto;width:95%; display: block;"><strong>Farmer\'s Signature:</strong>_________________________________________________</span>
                                </div>
                                <br />
                            </div>\'';


        $the_imgs = '<div class="image123" style="display: inline-block">
                        <div style="float: left">
                            <img src="img/cow.jpg" />
                            <p>This is a photo of the Farmers land</p>
                            
                        </div>
                        <div style="float: right">
                            <img style="float: right" class="middle-img" src="img/cow.jpg" />                          
                 
                        </div>
                       
                    </div>';

        $the_footer = '<table class="my_footer"><tr><td></td></tr></table>';
        $the_html =$the_style . '<div class="bordered">' . $the_title . $the_header .$the_firsttable.$the_secondtable.$the_imgs. $the_footer .  '</div>';
        return $the_html;
    }

}