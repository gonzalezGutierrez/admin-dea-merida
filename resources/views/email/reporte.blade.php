<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Reporte de ventas</h2>
        
        <table class="text-center mb-3" 
                 width="100%">
            <tr>                                                                                                    
                <td valign="top"                                                                                            
                        style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px">
                    <div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#1c78a5;line-height:25px;text-align:left">
                        <p style="padding: 0; margin: 0;">
                            NOMBRE DEL PROMOTOR:   {{ $correo["nombre"] }}
                        </p>
                        <span
                            class="mso-font-fix-arial">
                        </span>
                    </div>                                                                                                    
                </td>                                                                                                    
            </tr>                                                                                                    
        </table>
        
        <table 
                 width="100%">
            <tr>                                                                                                    
                <td valign="top"                                                                                            
                        style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px">
                    <div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#1c78a5;line-height:25px;text-align:left">
                        <p style="padding: 0; margin: 0;">
                            NOMBRE DE LA TIENDA:    {{ $correo["tienda_nombre"] }}
                        </p>
                        <span
                            class="mso-font-fix-arial">
                        </span>
                    </div>                                                                                                    
                </td>                                                                                                    
            </tr>                                                                                                    
        </table>
        
        <table 
                 width="100%">
            <tr>                                                                                                    
                <td valign="top"                                                                                            
                        style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px">
                    <div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#1c78a5;line-height:25px;text-align:left">
                        <p style="padding: 0; margin: 0;">
                        NO. DE TIENDA:  {{ $correo["tienda_numero"] }}
                        </p>
                        <span
                            class="mso-font-fix-arial">
                        </span>
                    </div>                                                                                                    
                </td>                                                                                                    
            </tr>                                                                                                    
        </table>
        <table 
                 width="100%">
            <tr>                                                                                                    
                <td valign="top"                                                                                            
                        style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px">
                    <div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#1c78a5;line-height:25px;text-align:left">
                        <p style="padding: 0; margin: 0;">
                        FECHA DE VISITA:   {{ $correo["fecha"] }}
                        </p>
                        <span
                            class="mso-font-fix-arial">
                        </span>
                    </div>                                                                                                    
                </td>                                                                                                    
            </tr>                                                                                                    
        </table>
        <table 
                 width="100%">
            <tr>                                                                                                    
                <td valign="top"                                                                                            
                        style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px">
                    <div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#1c78a5;line-height:25px;text-align:left">
                        <p style="padding: 0; margin: 0;">
                        MARCAS ATENDIDAS:  
                        @foreach($correo["marcas"] as $item)
                            {{ $item->nombre }}. 
                        @endforeach
                        <span
                            class="mso-font-fix-arial">
                        </span>
                    </div>                                                                                                    
                </td>                                                                                                    
            </tr>                                                                                                    
        </table>
        <table 
                 width="100%">
            <tr>                                                                                                    
                <td valign="top"                                                                                            
                        style="padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px">
                    <div style="font-family:Lato, Helvetica Neue, Helvetica, Arial, sans-serif;font-size:16px;color:#1c78a5;line-height:25px;text-align:left">
                        <p style="padding: 0; margin: 0;">
                        ACCIONES REALIZADAS:
                        @foreach($correo["acciones"] as $accion)
                            {{ $accion->accion }}. 
                        @endforeach
                        </p>
                        <span
                            class="mso-font-fix-arial">
                        </span>
                    </div>                                                                                                    
                </td>                                                                                                    
            </tr>                                                                                                    
        </table>
        <!-- <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Name</th>
                    <th scope="col">marca</th>
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table> -->

    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>