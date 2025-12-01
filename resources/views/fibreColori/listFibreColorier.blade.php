<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>List Fibre PDF</title>
    <style>
        body { font-family: sans-serif; width: 100% }
        .title { text-align: center; font-size: 16px; font-weight: bold; }
        ul { list-style: none; padding: 0; }
    
       table {
            font-family: Arial, Helvetica, sans-serif;
            /* border-collapse: collapse; */
            width: 100%;
            }

            td, th {
            /* border: 1px solid #ddd; */
            padding: 8px;
            }
            tr:nth-child(even){background-color: #fff;}
            
            tr:hover {background-color: #fff;}

            th {
            /* padding-top: 12px; */
            padding-bottom: 12px;
            text-align: left;
            background-color: #777777;
            color: white;
            }
    </style>
</head>
<body>

    
       
    <table   >
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Coleur</th>
      <th scope="col">Longuer</th>
      <th scope="col">Opératuer</th>
    </tr>
  </thead>
  <tbody>
    

    @foreach ($fibres as $fibre )
        <tr>
            
            <td>{{ $fibre->id }} </td>
            <td>{{ $fibre->color }} </td>
            <td>{{ $fibre->long }} </td>
            
            <td>
                {{ $fibre->user->grad}}     {{ $fibre->user->last_name}}   {{ $fibre->user->first_name}}
            </td>
            
     
        </tr>
    @endforeach
    
  </tbody>
</table>

</body>
</html>
