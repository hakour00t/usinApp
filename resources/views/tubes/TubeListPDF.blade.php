<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>List Tubes Laches Versioin PDF</title>
    <style>
        body { font-family: sans-serif; width: 100% }
        .title { text-align: center; font-size: 16px; font-weight: bold; }
        ul { list-style: none; padding: 0; }
    
       table {
            font-family: Arial, Helvetica, sans-serif;
            /* border-collapse: collapse; */
            width: 100%;
            }
        thead { display: table-row-group !important; }
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
    

    @foreach ($tubes as $tubes )
        <tr>
            
            <td>{{ $tubes->id }} </td>
            <td>{{ $tubes->color }} </td>
            <td>{{ $tubes->longueur }} </td>
            
            <td>
                {{ $tubes->user->grad}}     {{ $tubes->user->last_name}}   {{ $tubes->user->first_name}}
            </td>
            
     
        </tr>
    @endforeach
    
  </tbody>
</table>

</body>
</html>
