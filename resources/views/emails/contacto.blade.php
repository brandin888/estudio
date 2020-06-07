<!-- <link href="https://fonts.googleapis.com/css?family=Paytone+One|Poppins" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<div class="" style="width: 800px; background: #003B70;">
    <div style="border-bottom: 1px solid #1A5284;">
      <img src="{{url('images/logo.png')}}" alt="" style=" margin-left:275px; margin-top: 103.73px; ">
      <p style=" font-family: 'Paytone One';  font-size: 25px; line-height: 28px; text-align: center; color: #FFFFFF;" ></p>
      <div style="text-align:center; font-family: 'Paytone One'; font-size: 35px; line-height: 28px; color: #F99300;">
        <h3>Contacto #{{ $data->id }}</h3>
      </div>
    </div>
    <div style="padding:55px;">
      <div style="margin-left: 107px; margin-right: 107px; border-top: 1px solid #1A5284; border-left: 1px solid #1A5284; border-right: 1px solid #1A5284; padding: 30px 50px;">
        <table class="table">
          <thead>
            <tr style="height: 71px;">
              <th colspan="3" style="color: #FFFFFF; font-size: 15px; font-family: 'Paytone One'; text-align:left;">Nombre y apellido:</th>
              <th scope="col" s style="color: #F99300; font-size: 15px; font-family: 'Paytone One'; text-align:right;"> {{ $data->nombres }} </th>
            </tr>
          </thead>
          <tbody>
              <tr style="height: 71px;">
                <td  colspan="3" style="color: #FFFFFF; font-size: 15px; font-family:'Paytone One'; text-align:left;">Email:</td>
                <td style="color: #F99300; font-size: 15px; font-family: Paytone One; text-align:right;"> {{ $data->email }} </td>
              </tr>
              <tr style="height: 71px;">
                <td  colspan="3" style="color: #FFFFFF; font-size: 15px; font-family:'Paytone One'; text-align:left;">Teléfono:</td>
                <td style="color: #F99300; font-size: 15px; font-family: Paytone One; text-align:right;"> {{ $data->telefono }} </td>
              </tr>
              <tr style="height: 71px;">
                <td  colspan="3" style="color: #FFFFFF; font-size: 15px; font-family:'Paytone One'; text-align:left;">Asunto:</td>
                <td style="color: #F99300; font-size: 15px; font-family: Paytone One; text-align:right;"> {{ $data->asunto }} </td>
              </tr>
          </tbody>
        </table>
      </div>
      <div style="border: 1px solid #1A5284; background: #003B70; margin-left: 107px; margin-right: 107px; padding: 24px 80px;">
        <p style="font-size: 15px;  font-family: Paytone One;  line-height: 14px; text-align: center; color: #FFFFFF;">Mensaje</p>
        <h2 style="font-size: 20px;  font-family: Paytone One; line-height: 16px; text-align: center; color: #F99300;">{{ $data->mensaje }}</h2>
      </div>
    </div>
    <div style="width: 100%; padding: 20px 0px; text-align: center; border-top: 1px solid #1A5284;">
      <p style="font-family: Poppins; font-weight: 300; font-size: 12px; line-height: 14px; color: #818ABA;"  >
        © 2020 ELMAYORISTA Todos los derechos reservados. <a href="https://webtilia.com" target="_blank" style="color: #818ABA; text-decoration:none">By Webtilia</a>
      </p>
    </div>
</div>
