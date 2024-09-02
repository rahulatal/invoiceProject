<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Generate Invoice</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
    </head>
    <style>

h4 {
    margin: 0;
}
.w-full {
    width: 100%;
}
.w-half {
    width: 50%;
}
.margin-top {
    margin-top: 1.25rem;
}
.footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
}
table {
    width: 100%;
    border-spacing: 0;
}
table.products {
    font-size: 0.875rem;
}
table.products tr {
    background-color: rgb(96 165 250);
}
table.products th {
    color: #ffffff;
    padding: 0.5rem;
}
table tr.items {
    background-color: rgb(241 245 249);
}
table tr.items td {
    padding: 0.5rem;
}
.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}

    </style>
    <body>
        <form method="POST" action="{{url('/generate_Pdf')}}">
        @csrf
            <button class="btn btn-primary mt-5 ms-5" type="submit">Generate Invoice</button>
        </form>
        <button id="cmd">generate PDF</button>
        
        <div class="invoice">
        <table class="w-full" style="width: 100%; border-spacing: 0;">
        <tr>
            <td class="w-half">
                <img src="https://robohash.org/88.130.49.243.png" alt="laravel daily" width="200" />
            </td>
            <td class="w-half">
                <h2>Invoice ID: 834847473</h2>
            </td>
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>To:</h4></div>
                    <div>John Doe</div>
                    <div>123 Acme Str.</div>
                </td>
                <td class="w-half">
                    <div><h4>From:</h4></div>
                    <div>Laravel Daily</div>
                    <div>London</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
            </tr>
            <tr class="items">
                <td>Beautiful Marathi Wedding Invitation Video</td>
                <td>&#8377; 99.00</td>
            </tr>
        </table>
    </div>
 
    <div class="total">
        Total: &#8377; 99.00
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>&copy; Laravel Daily</div>
    </div>
    </div>
    </body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>

<script>

    var doc = new jsPDF();
    

    $('#cmd').click(function () {
        doc.fromHTML($('.invoice').html(), 15, 15);
//         var blob = new Blob([doc.output()], { type: 'application/pdf' });

// // Create a URL for the Blob
// var url = URL.createObjectURL(blob);

// // Open the PDF in a new tab/window
// window.open(url);
        doc.save('sample-file.pdf');
    });

</script>