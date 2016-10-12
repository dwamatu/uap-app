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
        $dompdf->stream();
    }

    public function makeLossAssessmentnote($assessment_id)
    {
        $assessment = LossCalculation::where('id',$assessment_id)->first();
        $the_style = '<style>
                                @page {
                                    margin: 0.9%;
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
                            img{
                            width: 200px;
                            height: 250px;
                            }
                        
                        </style>
                        ';
        $the_title = '<center><h2>LOSS ASSESSMENT NOTE</h2></center>';
        $the_header ='<table>

    <tr>
        <td><b>Farmers Name</b></td>
        <td colspan="2">'. ($assessment->farmer->farmer_name).'</td>
        <td><b>ID no</b></td>
        <td>'. ($assessment->farmer->id_number).'</td>

    </tr>
    <tr>
        <td><b>Farmers Zone</b></td>
        <td colspan="2">'. ($assessment->farmer->farmer_zone).'</td>
        <td><b>A/C no</b></td>
        <td>'. ($assessment->farmer->account_number).'</td>

    </tr>
    <tr>
        <td><b>Staff Name</b></td>
        <td colspan="3">'. ($assessment->user->first_name).' '.($assessment->user->last_name).'</td>


    </tr>
    <tr>

        <td><b>Planting Dates</b></td>

        <td>_________________________</td>
        <td><b>Inspection Dates</b></td>
        <td colspan="2">'. date('d-M-Y',strtotime($assessment->inspection_date)).'</td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>

    </tr>
    <tr>
        <td><b>Inspection no.</b></td>
        <td></td>


    </tr>
    <tr>
        <td><b>Cause of Loss:</b></td>
         <td></td>
       


    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2">
            Uniform or Non-uniform losses
        </td>
        <td  style="outline: thin solid"></td>
        <td  style="outline: thin solid"></td>
        <td  style="outline: thin solid"></td>
        <td  style="outline: thin solid"></td>
      
    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2">
            Hectares
        </td>

        <td style="outline: thin solid"> </td>
        <td style="outline: thin solid"> </td>
         <td colspan="2" style="outline: thin solid"> '. ($assessment-> farm->size_with_tobacco).' hectares</td>


    </tr>
    <tr style="outline: thin solid">
        <td style="outline: thin solid" colspan="6"><b>Leaf Damage(Damage on the surface area of the leaf quantified as % or given in cm<sup>2</sup>
            in case of drought</b></td>

    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2">Average useful surface area <b>(a)</b></td>

     
        <td style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
          <td colspan="2" style="outline: thin solid"> '. ($assessment-> average_useful_sa).'</td>

    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2">Normal leaf surface area <b>(b)</b></td>

       
        <td  style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
         <td colspan="2" style="outline: thin solid">'. ($assessment-> normal_leaf_sa).'</td>
    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="6"><b> Plant Damage(number of leaves damaged on the plant)</b></td>

    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2">Average no. of leaves on the plant <b>(c)</b></td>
       
        <td  style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
     
          <td colspan="2" style="outline: thin solid"> '. ($assessment->average_leaves_no).'</td>
    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2"> Normal no. leaves on the plant <b>(d)</b></td>
      
        <td style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
        
            <td colspan="2" style="outline: thin solid"> '. ($assessment->normal_leaves_no).'</td>
    </tr>
    <tr style="outline: thin solid">
        <td style="outline: thin solid" colspan="6"><b> Land damage (number of plants damaged on the land parcel)</b></td>

    </tr>
    <tr style="outline: thin solid">
        <td style="outline: thin solid" colspan="2">Average no. of plants on the land <b>(e)</b></td>
       
        <td style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
        
           <td colspan="2"style="outline: thin solid"> '. ($assessment->average_plant_no).'</td>
    </tr>
    <tr style="outline: thin solid">
    <td  style="outline: thin solid" colspan="2">Established no. of plants <b>(f)</b></td>
       
        <td  style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
      
         <td colspan="2" style="outline: thin solid">'. ($assessment->established_plant_no).'</td>
    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2"><b>Percentage Loss (%)</b></td>
       
        <td  style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
      
        <td colspan="2" style="outline: thin solid"> '. ($assessment->percentage_loss).'%</td>
    </tr>
    <tr style="outline: thin solid">
        <td  style="outline: thin solid" colspan="2"> <b>Leaf stage of the plant</b></td>
       
        <td  style="outline: thin solid"></td>
        <td style="outline: thin solid"></td>
       
         <td colspan="2" style="outline: thin solid"> '. ($assessment->leaf_stage).'</td>
    </tr>



    <tr>
        <td colspan="6"><b>Formulaes</b></td>

    </tr>

    <tr>
        <td colspan="6"><b>Good Agricultural Practises:</b>'. ($assessment->agricultural_practices).'</td>


    </tr>
    <tr>
        <td colspan="2"><b>Area Staff Comment:</b>'. ($assessment->area_staff_comment).'</td>
        <td colspan="4">____________________________________________</td>

    </tr>
    <tr>
        <td colspan="3">____________________________________________________</td>
        <td>Sign</td>
        <td>Date</td>
    </tr>
    <tr>
        <td colspan="2"><b>ALM Comment:</b>____________________________________________</td>
        <td colspan="4">____________________________________________________</td>

    </tr>
    <tr>
        <td colspan="3">____________________________________________________________
        <td>Sign</td>_____________________
        <td>Date</td>______________________</td>


    </tr>
    <tr>
        <td colspan="2"><b>Farmer\'s Signature:</b>_________________________</td>
        <td>______________________________________</td>
    </tr>
</table>';

        $the_imgs = '<div class="container" style="margin:20px;">
                        <span style="float:left;"><img src="img/cow.jpg" style="align:left;"></span>
                        <span></span>
                        <span style="float: right;"><img src="img/cow.jpg" style="align:right;"></span>
                          <span></span>
                    </div>';

        $the_footer = '<table class="my_footer"><tr><td></td></tr></table>';
        $the_html =$the_style . '<div class="bordered">' . $the_title . $the_header .$the_imgs. $the_footer .  '</div>';
        return $the_html;
    }

}