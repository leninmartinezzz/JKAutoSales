<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Factura de Vehículo - {{ config('app.name') }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #1a3a5f; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .footer { background: #ddd; padding: 10px; text-align: center; font-size: 12px; }
        .invoice-details { background: white; padding: 15px; margin: 15px 0; border-radius: 5px; }
        .vehicle-info { background: #e8f4fd; padding: 15px; margin: 15px 0; border-radius: 5px; }
        .total { font-size: 18px; font-weight: bold; color: #1a3a5f; }
        .thank-you { background: #d4edda; padding: 15px; margin: 15px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ config('app.name') }}</h1>
            <h2>Factura de Venta de Vehículo</h2>
        </div>
        
        <div class="content">
            <p>Hola <strong>{{ $customerName }}</strong>,</p>
            <p>Gracias por confiar en nosotros para la compra de tu vehículo. Aquí tienes los detalles de tu factura:</p>
            
            @if(isset($vehicleInfo))
            <div class="vehicle-info">
                <h3>Detalles del Vehículo</h3>
                <p><strong>Vehículo:</strong> {{ $vehicleInfo['marca'] }} {{ $vehicleInfo['modelo'] }}</p>
                <p><strong>Año:</strong> {{ $vehicleInfo['anio'] }}</p>
                <p><strong>Precio:</strong> ${{ number_format($vehicleInfo['precio'], 2) }}</p>
            </div>
            @endif
            
            <div class="invoice-details">
                <h3>Detalles de la Factura</h3>
                <p><strong>Número de Factura:</strong> {{ $invoice->DocNumber ?? 'N/A' }}</p>
                <p><strong>Fecha:</strong> {{ date('d/m/Y') }}</p>
                <p><strong>Servicio:</strong> Venta de Vehículo</p>
                <p class="total"><strong>Total:</strong> ${{ number_format($invoice->TotalAmt ?? 0, 2) }}</p>
            </div>

            <div class="thank-you">
                <p>¡Felicidades por tu nueva adquisición! Esperamos que disfrutes de tu vehículo.</p>
                <p>Si necesitas servicio post-venta o tienes alguna pregunta, no dudes en contactarnos.</p>
            </div>
            
            <p>Saludos cordiales,<br>
            El equipo de {{ config('app.name') }}</p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.</p>
            <p>Teléfono: (123) 456-7890 | Email: info@jkautosales.com</p>
        </div>
    </div>
</body>
</html>