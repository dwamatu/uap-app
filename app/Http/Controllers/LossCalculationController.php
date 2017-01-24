<?php

namespace App\Http\Controllers;

use App\LossCalculation;

use App\Utilities\LossUtilities;
use DB;
use Log;


use Dompdf\Dompdf;


class LossCalculationController extends Controller
{
    public function viewReportedClaims()
    {
        return view('loss.reported.list');
    }

    public function viewConfirmedClaims()
    {
        return view('loss.confirmed.list');
    }

    public function viewLossReports()
    {
        return view('reports.list');
    }
    public function getImage($uuid, $image)
    {
        if (($uuid !=null)&&($image!=null))
        {
            $path = "img/inspection_images/$uuid/$image";
        }
        else{
            $path = null;
        }
        return $path;
    }


    /**
     * @return Loss Calculations as Json
     */
    public function getConfirmedLossCalculations()
    {
        return (collect(LossUtilities::getConfirmedLosses())->toJson());

    }

    public function getReportedLossCalculations()
    {
        return (collect(LossUtilities::getReportedLosses())->toJson());

    }

    public function confirmLossAssessment($uuid)
    {
        $confirmLossreport = (collect(LossUtilities::confirmLossAssesment($uuid)));


        if ($confirmLossreport['data'][0]['id'] !== null && $confirmLossreport['data'][0]['uuid'] === $uuid) {
            return back();
        } else {
            return back()->withInput();
        }

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
        $dompdf->stream('Loss Assessment Report', array('Attachment' => 0));
    }

    public function makeLossAssessmentnote($assessment_id)
    {

        $assessmentDetails = LossUtilities::getLossAssessmentDetails($assessment_id);
        $pageData = $assessmentDetails[0];

        $cropImage1 = self::getImage($pageData['uuid'] ,$pageData['crop_image1']);
        $cropImage2 = self::getImage($pageData['uuid'] ,$pageData['crop_image2']);
        $formImage = self::getImage($pageData['uuid'] ,$pageData['farm_image']);

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
                                height: 100%;
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
                                position:absolute;
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
                              
           
                                       

                    
                    </style>
                    ';
        $the_title = '<center><h2>LOSS ASSESSMENT REPORT</h2></center>';
        $the_header = '<table class="ze_head" border=1 cellspacing=0 cellpadding="4" align="center">
                        <tr style="background-color:#DFDFDF;">
                            <th colspan="4">A. FARMER DETAILS</th>
                        </tr>

<tr>
    <td><b>Farmers Name</b></td>
    <td colspan="1">' . $pageData['farmer_name'] . '</td>
    <td><b>ID Number</b></td>
    <td>' . $pageData['id_no'] . '</td>

</tr>
<tr>
    <td><b>Farmers Zone</b></td>
    <td colspan="1">' . $pageData['farmer_zone'] . '</td>
    <td><b>Account Number</b></td>
    <td>' . $pageData['bat_acc_no'] . '</td>

</tr>
<tr>
    <td><b>Staff Name</b></td>
    <td colspan="1">' . $pageData['crop_inspector_name'] . '</td>
     <td><b>Planting Dates</b></td>
        
    <td colspan="1">' . date('d-M-Y', strtotime($pageData['planting_date'])) . '</td>

</tr>


</table>';
        // <editor-fold defaultstate="collapsed" desc=" First Table ">


        // </editor-fold>
        $the_firsttable = '<table class="ze_head" border=1 cellspacing=0 cellpadding="5" align="center">
                        <tr style="background-color:#DFDFDF;">
                            <th colspan="4">B. INSPECTION DETAILS</th>
                        </tr>
                        <tr>
                            <th width="200px">Cause of loss:</th><td>' . $pageData['cause_of_loss'] . '</td>
                            <th width="200px">Inspection Number:</th><td>' . $pageData['inspection_number'] . '</td>
                        </tr>
                        <tr>
                            <th>Size of Land:</th><td>' . $pageData['size_of_land'] . ' Hectares</td>
                            <th>Inspection Date:</th><td>' . date('d-M-Y , g:i a', strtotime($pageData['inspection_date'])) . '</td>
                        </tr>
                      
                    </table>';
        // </editor-fold>
        $the_secondtable = '<table class="ze_head" border=1 cellspacing=0 cellpadding="5" align="center">
                        <tr style="background-color:#DFDFDF;">
                            <th colspan="4">C. LOSS ASSESSMENT DETAILS</th>
                        </tr>
                        <tr>
                            <th width="250px">Farm Name:</th><td colspan="3">' . $pageData['farm_name'] . '</td>
                            
                        </tr>
                        <tr style="background-color:#DFDFDF;">
                            <th colspan="4">Leaf Damage(Damage on the surface area of the leaf quantified as % or given in cm<sup>2</sup>
        in case of drought</th>
                        </tr>
                        <tr>
                             <th style=" text-indent: 30px;">Average useful surface area <b>(a)</b></th><td style=" text-indent: 80px;" colspan="3">' . $pageData['average_useful_surfacearea'] . '</td>
                        
                        </tr>
                         <tr>
                           
                            <th style=" text-indent: 30px;">Normal leaf surface area <b>(b)</b></th><td style=" text-indent: 80px;"  colspan="3">' . $pageData['normal_leaf_surfacearea'] . '</td>
                        </tr>
                          <tr style="background-color:#DFDFDF;">
                            <th colspan="4">Plant Damage(number of leaves damaged on the plant)</b></th>
                        </tr>
                        <tr>
                             <th style=" text-indent: 30px;">Average no. of leaves on the plant <b>(c)</b></th> <td style=" text-indent: 80px;" colspan="3">' . $pageData['average_leaves_on_plant'] . '</td>
                        
                        </tr>
                         <tr>
                           
                            <th style=" text-indent: 30px;">Normal no. leaves on the plant <b>(d)</b></th><td style=" text-indent: 80px;"  colspan="3">' . $pageData['normal_leaves_on_plant'] . '</td>
                        </tr>
                        </tr>
                          <tr style="background-color:#DFDFDF;">
                            <th colspan="4">Land damage (number of plants damaged on the land parcel)</th>
                        </tr>
                        <tr>
                            <th style=" text-indent: 30px;">Average no. of plants on the land <b>(e)</b></th><td style=" text-indent: 80px;"  colspan="3">' . $pageData['normal_leaves_on_plant'] . '</td>
                        
                        </tr>
                         <tr>
                           
                             <th style=" text-indent: 30px;">Established no. of plants <b>(f)</b></th><td style=" text-indent: 80px;"  colspan="3">' . $pageData['average_no_of_plants_on_land'] . '</td>
                        </tr>
                        <tr>
                            <th>Percentage Loss (%)</th><td style=" text-indent: 80px;" colspan="3">' . number_format((float)$pageData['percentage_loss'] , 2, '.', '').' %</td>
                        
                        </tr>
                        <tr>
                            <th>Leaf stage of the plant</th><td style=" text-indent: 80px;" colspan="3">' . $pageData['leaf_stage_of_plant'] . '</td>
                        
                        </tr>
                        
                      
                    </table>';

        $the_comments = '  <div style="margin:5px auto;clear:both; font-size: 80%">
                                <span style="margin:auto auto;width:95%; display: block;"><strong>Good Agricultural Practices</strong> ' . $pageData['agricultural_practices'] . '</span>
                                <br />
                                <span style="margin:auto auto;width:95%; display: block;"><strong>Area Staff Comment:</strong> ' . $pageData['area_staff_comment'] . ' <br> Signature: ____________________ Date: ________________</span>
                                <br />
                                <br />
                                <span style="margin:auto auto;width:95%; display: block;"><strong>UAP Crop Inspector\'s Comment:</strong>______________________________________________________________________________________ <br> Signature: ____________________ Date: ________________</span>
                                <br />
                                <br />
                                <span style="margin:auto auto;width:95%; display: block;"><strong>ALM Comment:</strong>____________________________________________________________________________________________________ <br> Signature: ____________________ Date: ________________</span>
                                <br />
                                <span style="margin:auto auto;width:95%; display: block;"><strong>Farmer\'s Signature:</strong>_________________________________________________</span>
                        </div>';


        $the_imgs = '<table class="ze-head border=1 cellspacing=0 cellpadding="5" align="center">
                    <tr>
                    <td><img src="'.$cropImage1.'" width="350px" height="350px"></td>
                    <td><img src="'.$cropImage2.'" width="350px" height="350px"></td>
                    </tr>
                    <tr>
                    <td> <p style="text-align: center">Farm Photo A</p></td>
                    <td><p style="text-align: center">Farm Photo B</p></td>
                    </tr>                 
                    <tr>                  
                     <td style="align-content: center"> 
                     <img src="'.$formImage.'"  width="350px" height="350px"></td>
                     <td><p style="text-align: center">Loss Assessment Form</p></td>
                    </tr>
                    <tr>
                   
                    </tr>
                    
                    
                    </table>';


        $the_footer = '<table class="my_footer"><tr><td></td></tr></table>';
        $the_html = $the_style . '<div class="bordered">' . $the_title . $the_header . $the_firsttable . $the_secondtable . $the_comments . $the_footer . $the_imgs . '</div>';

        return $the_html;


    }

}