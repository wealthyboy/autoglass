<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>AUTOGLASS</title>
  <link rel="stylesheet" href="style.css" media="all" />
</head>
<style>
  @font-face {
    font-family: SourceSansPro;
    src: url(SourceSansPro-Regular.ttf);
  }

  .clearfix:after {
    content: "";
    display: table;
    clear: both;
  }

  a {
    color: #0087C3;
    text-decoration: none;
  }

  body {
    position: relative;
    width: 21cm;
    height: 20.7cm;
    margin: 0 auto;
    color: #555555;
    background: #FFFFFF;
    font-family: Arial, sans-serif;
    font-size: 14px;
    font-family: SourceSansPro;
  }

  header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #AAAAAA;
  }

  #logo {
    float: left;
    margin-top: 8px;
  }

  #logo img {
    height: 70px;
  }

  #company {
    float: right;
    text-align: right;
  }


  #details {
    margin-bottom: 15px;
  }

  #client {
    padding-left: 6px;
    border-left: 6px solid #006400;
    float: left;
  }

  #client .to {
    color: #777777;
  }

  h2.name {
    font-size: 1.4em;
    font-weight: bold;
    margin: 0;
  }

  #invoice {
    float: right;
    text-align: right;
  }

  #invoice h1 {
    color: #000;
    font-size: 2.4em;
    line-height: 1em;
    font-weight: normal;
    margin: 0 0 10px 0;
  }

  #invoice .date {
    font-size: 1.1em;
    color: #777777;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px;
  }

  table th,
  table td {
    padding: 5px 10px 5px 10px;
    background: #EEEEEE;
    text-align: center;
    border-bottom: 1px solid #FFFFFF;
  }

  .text-center {
    text-align: center !important;
  }

  table th {
    white-space: nowrap;
    font-weight: bold;
  }

  table td {
    text-align: right;
  }

  table td h3 {
    color: #000;
    font-size: 1.2em;
    font-weight: bold;
    margin: 0 0 0.2em 0;
  }

  table .no {
    color: #FFFFFF;
    font-size: 1.6em;
  }

  table .desc {
    text-align: left;
  }

  table .unit {
    background: #DDDDDD;
  }

  table .qty {}

  table .total {
    background: #57B223;
    color: #FFFFFF;
  }

  table td.unit,
  table td.qty,
  table td.total {
    font-size: 1.2em;
  }

  table tbody tr:last-child td {
    border: none;
  }

  table tfoot td {
    padding: 5px 20px;
    background: #FFFFFF;
    border-bottom: none;
    font-size: 1.2em;
    white-space: nowrap;
    border-top: 1px solid #AAAAAA;
  }

  table tfoot tr:first-child td {
    border-top: none;
  }

  table tfoot tr:last-child td {
    color: #000;
    font-size: 1.4em;
    border-top: 1px solid #57B223;

  }

  table tfoot tr td:first-child {
    border: none;
  }

  #thanks {
    font-size: 2em;
    margin-top: 10px;
  }

  #notices {

    padding-left: 6px;
    border-left: 6px solid #006400;

  }

  #notices .notice {
    font-size: 1.2em;
  }

  td.qty {
    text-align: center;
  }

  .mb-4 {
    /* margin-bottom: 2rem; */
  }

  footer {
    color: #777777;
    width: 100%;
    height: 30px;
    position: absolute;
    bottom: 0;
    border-top: 1px solid #AAAAAA;
    padding: 8px 0;
    text-align: center;
  }
</style>

<body>
  <header class="clearfix">
    <div id="logo">
      <img src="/images/logo/Autoglass_logo2.png">
    </div>
    <div id="company">
      <div>Tapa House, Imam Dauda Street<br /> Off Eric Moore</br> Surulere,Lagos</div>
      <div>{{ optional($setting)->phone }}</div>
    </div>
    </div>
  </header>
  <main>
    <div id="details" class="clearfix">
      <div id="client">
        <div class="to">INVOICE TO:</div>
        <h2 class="name">{{ $order->first_name  .' '.  $order->last_name }}</h2>
        <div class="address">{{ optional($order)->address }}, {{ $order->city }} {{ $order->state }}</div>
        <div class="email"><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></div>
        <div class="email"><a href="tel:{{ $order->phone }}">{{ $order->phone_number }}</a></div>

      </div>
      <div id="invoice">
        <h1>INVOICE </h1>
        <div class="date">Date of Invoice: {{ $order->created_at->format('d/m/y') }}</div>
        <div class="date">Invoice No: {{ $order->invoice }}</div>
        <div class="date">Payment Type: {{ ucfirst(implode(' ',explode('_',$order->payment_type))) ?? 'Payment on delivery'}}</div>


      </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th class="desc">ITEM</th>
          <th class="desc">PRICE</th>
          <th class="qty">QUANTITY</th>
          <th class="qty"></th>
          <th class="qty">TOTAL</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($order->ordered_products as $ordered_product) { ?>

          <tr>
            <td class="desc">
              <h3>{{ $ordered_product->product_name }}</h3>
            </td>
            <td class="desc">{{ $order->currency }}₦{{ number_format( $ordered_product->price) }}</td>
            <td class="qty ">{{ $ordered_product->quantity }}</td>
            <td class="desc"></td>
            <td class="desc text-center">{{ $order->currency }}₦{{ number_format( $ordered_product->price * $ordered_product->quantity) }}</td>

          </tr>

        <?php } ?>

      </tbody>
      <tfoot class="mb-4">
        <tr>
          <td colspan="2"></td>
          <td colspan="2">SUBTOTAL</td>
          <td>{{ $order->currency }}₦{{ number_format($sub_total) }}</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">Discount</td>
          <td>{{ $summaries['Discount']  }}</td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td colspan="2">Shipping</td>
          <td>{{ $order->currency }}{{$summaries['Shipping'] }}</td>
        </tr>

       
        <tr>
          <td colspan="2"></td>
          <td colspan="2">TOTAL</td>
          <td>{{ $summaries['Total'] }}</td>
        </tr>
      </tfoot>
    </table>
    <div id="notices">
      <div id="thanks">Thank you!</div>

      <div></div>
      <div class="notice">
        Thanks for choosing AutoglassNg</br>
        Should you need any sort of further assistance, we are always ready to assist.</br>
        You can reach us by phone at  07040333495 or by email at info@autoglass.ng.</br>
      </div>
    </div>


  </main>

</body>

</html>