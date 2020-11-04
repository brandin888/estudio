<!-- <link href="https://fonts.googleapis.com/css?family=Paytone+One|Poppins" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<div class="" style="width: 800px; background: white;">
    <div style="border-bottom: 1px solid #1a5284;">
      <div style="text-align:center; font-family: 'Paytone One'; font-size: 35px; line-height: 28px; color: #1a5284;">
        <h3>Contacto #{{ $data->id }}</h3>
      </div>
    </div>
    <div style="padding:55px;">
      <div style="margin-left: 107px; margin-right: 107px; border-top: 1px solid #1A5284; border-left: 1px solid #1A5284; border-right: 1px solid #1A5284; padding: 30px 50px;">
        <table class="table">
          <thead>
            <tr style="height: 71px;">
              <th colspan="3" style="color: #1a5284; font-size: 20px; font-family: 'Paytone One'; text-align:left;"><strong>Nombre y apellido:</strong></th>
              <th scope="col" s style="color: #000000; font-size: 17px; font-family: 'Paytone One'; text-align:right;"> {{ $data->nombres }} </th>
            </tr>
          </thead>
          <tbody>
              <tr style="height: 71px;">
                <td  colspan="3" style="color: #1a5284; font-size: 20px; font-family:'Paytone One'; text-align:left;"><strong>Email:</strong></td>
                <td style="color: #000000; font-size: 17px; font-family: Paytone One; text-align:right;"> {{ $data->email }} </td>
              </tr>
              <tr style="height: 71px;">
                <td  colspan="3" style="color: #1a5284; font-size: 20px; font-family:'Paytone One'; text-align:left;"><strong>Teléfono:</strong></td>
                <td style="color: #000000; font-size: 17px; font-family: Paytone One; text-align:right;"> {{ $data->telefono }} </td>
              </tr>
              <tr style="height: 71px;">
                <td  colspan="3" style="color: #1a5284; font-size: 20px; font-family:'Paytone One'; text-align:left;"><strong>Asunto:</strong></td>
                <td style="color: #000000; font-size: 17px; font-family: Paytone One; text-align:right;"> {{ $data->asunto }} </td>
              </tr>
          </tbody>
        </table>
      </div>
      <div style="border: 1px solid #1A5284; background: white; margin-left: 107px; margin-right: 107px; padding: 24px 80px;">
        <p style="font-size: 20px;  font-family: Paytone One;  line-height: 25px; text-align: center; color: #1a5284;"><strong>Mensaje</strong></p>
        <h2 style="font-size: 17px;  font-family: Paytone One; text-align: center; color: #000000;">{{ $data->mensaje }}</h2>
      </div>
    </div>
    <div style="width: 100%; padding: 20px 0px; text-align: center; border-top: 1px solid #1A5284;">
      <p style="font-family: Poppins; font-weight: 300; font-size: 12px; line-height: 14px; color: #818ABA;"  >
        © 2020 Micky SRL Todos los derechos reservados.
      </p>
    </div>
</div>
