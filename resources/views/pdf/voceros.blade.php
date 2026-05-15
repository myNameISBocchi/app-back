<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; font-size: 10px; color: #333; }
        .header { text-align: center; margin-bottom: 20px; text-transform: uppercase; }
        .header h2 { margin: 5px 0; border-bottom: 1px solid #000; display: inline-block; padding-bottom: 5px; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; table-layout: fixed; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; word-wrap: break-word; }
        
        .section-title { 
            background: #d32f2f; 
            color: #ffffff;
            font-weight: bold; 
            text-align: center; 
            text-transform: uppercase;
        }

        .table-head th { 
            background: #f2f2f2; 
            font-weight: bold; 
            text-transform: uppercase; 
            font-size: 9px; 
            text-align: center; 
            vertical-align: middle;
        }

        .text-center { text-align: center; }
        .bold { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
    <h2>{{ $title }}</h2> <p class="bold">COMUNA SOCIALISTA FLOR MONTIEL</p>
</div>

    @foreach($group as $comite => $voceros)
        <table>
            <thead>
                <tr>
                    <th colspan="5" class="section-title">
                        UNIDAD: {{ $comite ?: 'UNIDAD ADMINISTRATIVA' }}
                    </th>
                </tr>
                <tr class="table-head">
                    <th style="width: 5%;">N°</th>
                    <th style="width: 35%;">Nombre y Apellido</th>
                    <th style="width: 15%;">Cédula</th>
                    <th style="width: 15%;">Teléfono</th>
                    <th style="width: 30%;">Comité</th>
                </tr>
            </thead>
            <tbody>
                @foreach($voceros as $index => $v)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="bold">{{ strtoupper($v->firstName) }} {{ strtoupper($v->lastName) }}</td>
                    <td class="text-center">{{ $v->identification }}</td>
                    <td class="text-center">{{ $v->phone ?: 'N/D' }}</td>
                    <td>{{ $v->committeeName ?: 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>