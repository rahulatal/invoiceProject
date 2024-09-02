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
.products th, .products td {
    text-align: center;
}
.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}

    </style>

    <table class="w-full">
        <tr>
            <td class="w-half">
                <img src="{{ base_path('images/Invitecrafterheader.png') }}" alt="invitecrafter_logo" width="200" />
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
                    <div>6293293797</div>
                </td>
                <td class="w-half">
                    <div><h4>From:</h4></div>
                    <div>Invitecrafter.com</div>
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
                <td>{{ $data['product_name'] }}</td>
                <td>
                    <h4>&#8377;  {{ $data['price'] }}</h4>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="total">
        <h2>Total: &#8377; {{ $data['price'] }}</h2>
    </div>
 
    <div class="footer margin-top">
        <div>Thank you</div>
        <div>Invitecrafter.com</div>
    </div>
