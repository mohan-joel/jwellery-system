<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jewelry Shop Bill</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/print.css')}}" media="print">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .bill {
      width: 80%;
      margin: 20px auto;
      border: 1px solid #ccc;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    header {
      text-align: center;
      margin-bottom: 20px;
      
    }

    header img {
        float:left;
      max-width: 100px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    .total {
      margin-top: 20px;
      text-align: right;
      margin-right:30px;
      
    }

    .customer-info {
      margin-bottom: 20px;
      display:flex;
      justify-content:space-between;
    }
    .date{
        text-align: right;
    }
  </style>
</head>
<body>


  <div class="bill">

    <div class="date">
      <p><strong>Date:</strong> {{ $saleOrder->date }}</p>
    </div>

    <header>
      <img src="{{ asset('uploads/'.$shop->shop_logo ) }}" alt="Shop Logo" style="height:100px; width:100px; border-radius:100px;">
      <h2>{{ $shop->shop_name }}</h2>
      <p>{{ $shop->shop_address }}</p>
      <p>Phone No.: {{ $shop->shop_contact }}</p>
    </header>

    <div class="customer-info">
      <p><strong>Invoice No.:</strong> {{ $saleOrder->invoice_num }}</p>
      <p><strong>Customer:</strong> {{ $saleOrder->customer->name }}</p>
      <p><strong>Contact:</strong> +977 {{ $saleOrder->customer->contact }}</p>
      <p><strong>Address:</strong> {{ $saleOrder->customer->address }}</p>
    </div>

    <table id="bill_table">
      <thead>
        <tr>
           <th>Jwellery Type</th> 
          <th>Item</th>
          <th>Description</th>
          <th id="quantity">Quantity</th>
          <th id="price"> Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
            <td>{{ $saleOrder->jwelleryType->jwellery_type_name }}</td>
          <td>{{ $saleOrder->product->product_name  }}</td>
          <td>{{ $saleOrder->product->description  }}</td>
          <td>{{ $saleOrder->ordered_qty  }}</td>
          <td>{{ $saleOrder->product->product_sp  }}</td>
          <td></td>
        </tr>
        <!-- Add more rows for additional items -->
      </tbody>
    </table>

    <div class="total">
      <p><strong>Subtotal:</strong> Rs.<span id="subtotal"></span></p>
      <p><strong>VAT (<span id="tax_per">{{ $saleOrder->tax}}</span>%):</strong> Rs. <span id="tax_amt"></span></p>
      <p><strong>Discount(<span id="dicount_per">{{ $saleOrder->discount }}</span>%):</strong> Rs. <span id="discount_amt"></span></p>
      <p><strong>Total Payable:</strong> Rs. <span id="payable_amt"></span>/-</p>
    </div>
  </div>

  <div class="container">
      <div class="row">
            <button type="button" class="btn btn-secondary" id="print_btn" onclick="window.print()">Print</button><button type="button" class="btn btn-primary" id="btn_go_back" onclick="window.location.href='/sale-order'">Go Back</button>
      </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#bill_table tbody tr').each(function(){

                var quantity = parseInt($(this).find('td:eq(3)').text());
                var rate = parseInt($(this).find('td:eq(4)').text());
                var tax_per = parseInt($("#tax_per").text());
                var dis_per = parseInt($("#dicount_per").text());
                var total = quantity * rate;
                var tax_amt = tax_per/100*total;
                var amt_with_tax = total + tax_amt;
                var discount_amt = dis_per/100*amt_with_tax;
                var payable_amt = amt_with_tax - discount_amt;
                $("#tax_amt").text(tax_amt);
                $("#discount_amt").text(discount_amt);
                $(this).find('td:eq(5)').text(total);
                $("#subtotal").text(total);
                $("#payable_amt").text(payable_amt);
            });
        });
    </script>
</body>
</html>
