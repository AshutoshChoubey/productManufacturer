<!DOCTYPE html>
<html>
  <head>
    <title>Measurement Data</title>
    <style>
     body {
      color: green;
    }
    </style>
  </head> 
  <body>
      <div style="width:100%;height:57px;" >
        <table  width="100%" rules="cols" border="1">
          <tr>
            <td width="95%" align="center" >
              <div>
                <b>M/S Krishna Plast</b><br>
               <b>Office</b>:6,bhoi sahi,nayapali,bhubaneswer-12 , odisha<br>
                <b>Factory</b>:501/954,ALKAR,JANKA,KHRODA_54,Odisha
              </div>
            </td>
            <td width="5%" align="center" >
              <div>
                <b>Sl. No:</b> {{ $MeasurementQuatationView['1']['measurementQuatationId'] }}
              </div>
            </td>
          </tr>       
        </table>
      </div>
      <div style="width:100%;height:60px;font-size: 21px;  text-align: center" >
        <br>
              <b>Measurement Sheet For UPVC AND DOOR system</b><br><br>
      </div>
      <div>
        <table style="width:100%;height:57px;"   >
          <tr>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>              
          </tr> 
          <tr>
            <td colspan="1">&nbsp;</td>
            <td colspan="5" align="left">
              <table  width="100%">
                <tr>
                  <td width="50%">Customer Name :</td>
                  <td width="50%" align="left">{{ $MeasurementQuatationView['0']['customerName'] }}</td>
                </tr>
                <tr>
                  <td width="50%">Contact Persion:</td>
                  <td width="50%" align="left">{{$MeasurementQuatationView['0']['contact_person'] }}</td>
                </tr>
                <tr>
                  <td width="30%">Measurement Site:</td>
                  <td width="70%" align="left">{{ $MeasurementQuatationView['0']['measurementQuatationId'] }}</td>
                </tr>
              </table>
            </td>           
            <td colspan="5" align="right">
              <table  width="100%">
                 <tr>
                  <td width="50%">date :</td>
                  <td width="50%" align="left">{{$MeasurementQuatationView['0']['created_at'] }}</td>
                </tr>
                <tr>
                  <td width="30%">Contact Number:</td>
                  <td width="70%" align="left">{{$MeasurementQuatationView['0']['contactNo'] }}</td>
                </tr>
                 <tr>
                  <td width="30%">email:</td>
                  <td width="70%" align="left">{{ $MeasurementQuatationView['0']['email'] }}</td>
                </tr>   
              </table>
            </td>
            <td colspan="1">&nbsp;</td>        
          </tr>   
        </table>
        <table  border="1" rules="cols"  width="100%">
              <thead  style="text-align:center; border-style: solid;">
                <tr>
                  <th style="white-space: nowrap">drawing</th>
                  <th style="white-space: nowrap"><small>window_des</small></th>
                  <th style="white-space: nowrap">width</th>
                  <th style="white-space: nowrap">height</th>
                  <th style="white-space: nowrap">area</th>
                  <th style="white-space: nowrap">quantity</th>
                  <th style="white-space: nowrap">glass</th>
                  <th style="white-space: nowrap">drawing_description</th>               
                </tr>
              </thead>
              <tbody style="text-align:center;border-style: solid;">
                @foreach($MeasurementQuatationView as $key => $value)
                <tr>
                  <td>{{ $value['drawing'] }}</td>
                  <td>{{ $value['window_des'] }}</td>
                  <td>{{ $value['width'] }}</td>
                  <td>{{ $value['height'] }}</td>
                  <td>{{ $value['area'] }}</td>
                  <td><small>{{ $value['quantity'] }}</small></td>
                  <td>{{ $value['glass'] }}</td>
                  <td>{{ $value['drawing_description'] }}</td>                 
                </tr>  
                @endforeach
              </tbody>
          <tfoot>
            <tr>
                <td colspan="4">Measurement Confirmed By:{{$MeasurementQuatationView['0']['measurement_taken_by'] }}</td>
                 <td  colspan="4">Measurement taken By:{{$MeasurementQuatationView['0']['measurement_taken_by'] }}</td>
            </tr>
            <tr>
            <td  colspan="4" >Measurement Received For Production:{{$MeasurementQuatationView['0']['measurement_received_for_production'] }}</td>
                 <td  colspan="4" colspan="2">about:{{$MeasurementQuatationView['0']['about'] }}</td>
            </tr>
            
          </tfoot>
        </table>
      </div>
        <div style="text-align: right" width="100%">
      Signature:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
      </div>
  </body>
</html>
