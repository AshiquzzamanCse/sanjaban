<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Invoice</title>

</head>

<body class="clean-body u_body" style="margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0"
        style="
        border-collapse: collapse;
        width: 100%;
        max-width: 750px;
        margin: 0 auto;
        background-color: #f4f4f4;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
      ">
        <tr>
            <td>
                <!-- Your email content goes here -->
                <section
                    style="
              margin-top: 0rem;
              margin-bottom: 0rem;
              box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            ">
                    <!-- Email Header Start -->
                    <div class="wrapper" style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px">
                        <!-- Email Header Start -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="
                    border-collapse: collapse;
                    table-layout: fixed;
                    border-spacing: 0;
                    vertical-align: top;
                    min-width: 20rem;
                    margin: 0 auto;
                    width: 100%;
                    background-color: #94a56b;
                  "
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 20rem">
                                    <tr
                                        style="
                        vertical-align: top;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        padding: 15px;
                      ">
                                        <td>
                                            <a href="www.dadabhaai.com" target="_blank">
                                                <img src="https://www.dadabhaai.com/storage/main/jaragroups404413.png"
                                                    alt="DadaBhai" title="DadaBhai"
                                                    style="
                              outline: none;
                              text-decoration: none;
                              -ms-interpolation-mode: bicubic;
                              clear: both;
                              display: inline-block !important;
                              border: none;
                              height: auto;
                              float: none;
                              width: 7.5rem;
                            "
                                                    width="60" />
                                            </a>
                                        </td>
                                        <td>
                                            <p
                                                style="
                            font-size: 1.125rem;
                            font-weight: 600;
                            margin-bottom: 0;
                            color: #fff;
                          ">
                                                NGEN IT LTD.
                                            </p>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Email Header End -->
                        <!-- Email User Info Start -->
                        <div style="overflow-x: auto">
                            <table
                                style="
                    border-collapse: collapse;
                    table-layout: fixed;
                    border-spacing: 0;
                    vertical-align: top;
                    min-width: 20rem;
                    margin: 0 auto;
                    width: 100%;
                    overflow: hidden;
                  ">
                                <tbody style="min-width: 20rem">
                                    <tr style="vertical-align: top">
                                        <td style="padding: 0rem 1.875rem; text-align: left">
                                            <div>
                                                <div
                                                    style="
                              padding-top: 1.25rem;
                              padding-left: 0;
                            ">
                                                    <h3
                                                        style="
                                font-size: 1.125rem;
                                font-family: 'Poppins', sans-serif;
                                color: #ae0a46;
                              ">
                                                        {{ $order->billing_name }}
                                                    </h3>

                                                    <div>
                                                        <p
                                                            style="
                                  padding-bottom: 0.3125rem;
                                  font-size: 13px;
                                ">
                                                                <span>{{ $order->billing_email }}</span>

                                                        </p>
                                                        <p
                                                            style="
                                  padding-bottom: 0.3125rem;
                                  font-size: 13px;
                                ">
                                                            <a href=""
                                                                style="color: #3d3d3d; text-decoration: none">
                                                                <span> {{ $order->billing_phone }}</span>
                                                            </a>
                                                        </p>
                                                        <p
                                                            style="
                                  padding-bottom: 0.3125rem;
                                  font-size: 13px;
                                ">
                                                                <span>{{ $order->billing_address_line1 }} {{ $order->billing_address_line2 }}</span>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            style="
                          width: 0.125rem;
                          background: #eee;
                          padding: 0px;
                          height: 10rem;
                          margin: 0px;
                          position: relative;
                          right: -30px;
                          top: 15px;
                        ">
                                            <p></p>
                                        </td>
                                        <td style="text-align: end">
                                            <div style="padding: 0 1.875rem">
                                                <h3
                                                    style="
                              padding: 0.625rem;
                              color: #ae0a46;
                              text-align: end;
                              font-size: 1.125rem;
                              margin-top: 10px;
                            ">
                                                    Price Quotation
                                                </h3>
                                                <p
                                                    style="
                              color: #3d3d3d;
                              padding-bottom: 0.3125rem;
                              font-size: 13px;
                            ">
                                                    Date : {{ $order->order_date }}
                                                </p>
                                                <p
                                                    style="
                              color: #3d3d3d;
                              padding-bottom: 0.3125rem;
                              font-size: 13px;
                            ">
                                                    Invoice No#: {{ $order->invoice_number }}
                                                </p>
                                                <p
                                                    style="
                              color: #3d3d3d;
                              padding-bottom: 0.3125rem;
                              font-size: 13px;
                            ">
                                                    Order Number#: {{ $order->order_number }}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Email User Info End -->
                        <!-- Main Content Start -->
                        <div
                            style="
                  overflow-x: auto;
                  padding-left: 1.875rem;
                  padding-right: 1.875rem;
                  padding-top: 0.9375rem;
                  padding-bottom: 0.9375rem;
                ">
                            <table
                                style="
                    border-collapse: collapse;
                    width: 100%;
                    border: 1px solid #eee;
                  ">
                                <!-- Table Header Start -->
                                <tr
                                    style="
                      background-color: #e5e5e5;
                      color: #3d3d3d;
                      border: 1px solid #eee;
                      font-size: 13px;
                    ">
                                    <th
                                        style="
                        text-align: center;
                        padding: 0.5rem;
                        font-weight: 400;
                      ">
                                        Sl
                                    </th>
                                    <th
                                        style="
                        text-align: start;
                        padding: 0.5rem;
                        font-weight: 400;
                      ">
                                        Product Description
                                    </th>
                                    <th
                                        style="
                        text-align: center;
                        padding: 0.5rem;
                        font-weight: 400;
                      ">
                                        Qty
                                    </th>
                                    <th
                                        style="
                        text-align: center;
                        padding: 0.5rem;
                        font-weight: 400;
                      ">
                                        Unit Price
                                    </th>
                                    <th
                                        style="
                        text-align: center;
                        padding: 0.5rem;
                        font-weight: 400;
                      ">
                                        Total ($)
                                    </th>
                                </tr>
                                <!-- Table Header End -->

                                @foreach ($orderitem as $key => $item)
                                    <tr
                                        style="
                 text-align: start;
                 padding: 0.5rem;
                 color: #3d3d3d;
                 font-size: 13px;
                 border: 1px solid #eee;
               ">
                                        <td
                                            style="
                   border: 1px solid #eee;
                   padding: 0.5rem;
                   text-align: center;
                 ">
                                            {{ $key + 1 }}
                                        </td>
                                        <td style="border: 1px solid #eee; padding: 8px">
                                            {{ $item->product->product_name }}
                                        </td>
                                        <td
                                            style="
                   border: 1px solid #eee;
                   padding: 0.5rem;
                   text-align: center;
                 ">
                                            {{ $item->qty }}
                                        </td>
                                        <td
                                            style="
                   border: 1px solid #eee;
                   padding: 0.5rem;
                   text-align: center;
                 ">
                                            $ {{ $item->price }}
                                        </td>
                                        <td
                                            style="
                   border: 1px solid #eee;
                   padding: 0.5rem;
                   text-align: center;
                 ">
                                            {{-- Tk {{ $item->qty * $item->price }} --}}0
                                        </td>
                                    </tr>
                                @endforeach


                            </table>
                            <!--  -->

                            <div style="display: flex; justify-content: end">
                                <table
                                    style="
                      border-collapse: collapse;
                      width: 100%;
                      font-size: 13px;
                      border: 1px solid #eee;
                    ">
                                    <tr
                                        style="
                        text-align: end;
                        padding: 0.5rem;
                        color: #3d3d3d;
                        font-size: 13px;
                      ">
                                        <th
                                            style="
                          width: 85%;
                          text-align: end;
                          padding: 0.5rem;
                          color: #3d3d3d;
                          font-weight: 400;
                        ">
                                            Sub Total
                                        </th>
                                        <th
                                            style="
                          width: 15%;
                          text-align: end;
                          padding: 0.5rem;
                          border-left: 1px solid #eee;
                          color: #3d3d3d;
                          text-align: end;
                          font-weight: 400;
                        ">
                                            $ {{ $order->total_amount - $order->shipping_charge }}.00
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <!--  -->
                            <div>
                                <div style="display: flex; justify-content: end">
                                    <table
                                        style="
                        border-collapse: collapse;
                        width: 100%;
                        border: none;
                      ">
                                        <tr
                                            style="
                          text-align: end;
                          padding: 0.5rem;
                          color: #3d3d3d;
                          font-size: 13px;
                          border: 1px solid #eee;
                        ">
                                            <td
                                                style="
                            width: 85%;
                            text-align: end;
                            padding: 10px;
                            color: #3d3d3d;
                          ">
                                                Shipping Charge
                                            </td>
                                            <td
                                                style="
                            width: 15%;
                            text-align: end;
                            padding: 0.5rem;
                            border-left: 1px solid #eee;
                            color: #3d3d3d;
                          ">
                                                {{-- Tk {{ $order->shipping_charge }} --}} 0
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!--  -->
                            <!--  -->
                            <div style="display: flex; justify-content: end">
                                <table
                                    style="
                      border: 1px solid #eee;
                      border-collapse: collapse;
                      background-color: #eee;
                      width: 100%;
                      font-size: 13px;
                    ">
                                    <tr
                                        style="
                        text-align: end;
                        padding: 0.5rem;
                        border: 1px solid #eee;
                        color: #3d3d3d;
                        font-size: 13px;
                      ">
                                        <th
                                            style="
                          width: 85%;
                          text-align: end;
                          padding: 0.5rem;
                          color: #3d3d3d;
                          border: none;
                        ">
                                            Grand Total
                                        </th>
                                        <th
                                            style="
                          width: 15%;
                          text-align: end;
                          padding: 0.5rem;
                          color: #3d3d3d;
                          text-align: end;
                          border-left: 1px solid #eee;
                        ">
                                            $ {{ $order->total_amount }}
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <!--  -->
                            <div
                                style="
                    display: flex;
                    justify-content: end;
                    margin-top: 1rem;
                    margin-bottom: 1rem;
                  ">
                                <table
                                    style="
                      border-collapse: collapse;
                      width: 60%;
                      margin: auto;
                      font-size: 13px;
                      border: 1px solid #eee;
                    ">
                                    <tr
                                        style="
                        width: 6%;
                        text-align: end;
                        padding: 0.5rem;
                        color: #3d3d3d;
                        font-size: 13px;
                        border-bottom: 1px solid #eee;
                      ">
                                        <th
                                            style="
                          text-align: center;
                          padding: 0.5rem;
                          color: #3d3d3d;
                          font-weight: 400;
                        ">
                                            <span>
                                                <strong>Payment Method:</strong> {{ $order->payment_method }}
                                            </span>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <!--  -->
                            <div>
                                <div>
                                    <table
                                        style="
                        margin-top: 0.5rem;
                        border: 1px solid #eee;
                        border-collapse: collapse;
                        width: 100%;
                      ">
                                        <tr
                                            style="
                          text-align: start;
                          padding: 0.5rem;
                          color: #3d3d3d;
                          font-size: 13px;
                          border: 1px solid #eee;
                        ">
                                            <th colspan="2"
                                                style="
                            text-align: center;
                            padding: 0.5rem;
                            background-color: #e5e5e5;
                            color: #3d3d3d;
                            border: 1px solid #eee;
                          ">
                                                Terms & Conditions
                                            </th>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                            padding: 0.3125rem 10px;
                            font-size: 13px;
                            color: #3d3d3d;
                            font-weight: 600;
                          ">
                                                Validity :
                                            </td>
                                            <td
                                                style="
                            padding: 0.3125rem 10px;
                            font-size: 13px;
                            font-family: 'Raleway', sans-serif;
                            color: #3d3d3d;
                          ">
                                                7 Day from the PQ date on regular price. Offer may
                                                change on the bank forex rate
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                            padding: 0.3125rem 10px;
                            /* padding-left: 0px; */
                            font-size: 13px;
                            color: #3d3d3d;
                            font-weight: 600;
                          ">
                                                Payment :
                                            </td>
                                            <td
                                                style="
                            padding: 2px 10px;
                            font-size: 13px;
                            font-family: 'Raleway', sans-serif;
                            color: #3d3d3d;
                          ">
                                                100% Advanced payment with Work Order. Order cannot be
                                                cancelled once issues
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                            padding: 0.3125rem 10px;
                            /* padding-left: 0px; */
                            font-size: 13px;
                            color: #3d3d3d;
                            font-weight: 600;
                          ">
                                                Delivery :
                                            </td>
                                            <td
                                                style="
                            padding: 2px 10px;
                            font-size: 13px;
                            font-family: 'Raleway', sans-serif;
                            color: #3d3d3d;
                          ">
                                                Payment must be made through Telegraphic Transfer (TT)
                                                or Wire Transfer
                                            </td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="
                            padding: 0.3125rem 10px;
                            /* padding-left: 0px; */
                            font-size: 13px;
                            color: #3d3d3d;
                            font-weight: 600;
                          ">
                                                Installation :
                                            </td>
                                            <td
                                                style="
                            padding: 2px 10px;
                            font-size: 13px;
                            font-family: 'Raleway', sans-serif;
                            color: #3d3d3d;
                          ">
                                                We may reject order on any dispute in principal price
                                                or product non-availability.
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Main Content End -->
                        <!-- Column Area -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="
                    border-collapse: collapse;
                    table-layout: fixed;
                    border-spacing: 0;
                    vertical-align: top;
                    min-width: 320px;
                    margin: 0 auto;
                    width: 100%;
                  "
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <td style="padding: 0">
                                            <table style="width: 100%; border-collapse: collapse">
                                                <tbody>
                                                    <tr>
                                                        <td
                                                            style="
                                  padding: 0.9375rem;
                                  padding-left: 1.875rem;
                                  padding-right: 1.875rem;
                                  background-image: url(https://img.freepik.com/free-photo/white-painted-wall-texture-background_53876-138197.jpg);
                                  background-size: cover;
                                ">
                                                            <table style="width: 100%; border-collapse: collapse">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="
                                          text-align: start;
                                          color: #ffffff;
                                        ">
                                                                            <p
                                                                                style="
                                            font-size: 13px;
                                            font-weight: 600;
                                            padding-bottom: 0.5rem;
                                            margin: 0;
                                            color: #000;
                                          ">
                                                                                Thank You
                                                                            </p>
                                                                            <p style="color: #ae0a46; margin: 0">
                                                                                Dadahaai Team
                                                                            </p>

                                                                        </td>
                                                                        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Column Area End -->
                        <!-- Email Footer -->
                        <div style="overflow-x: auto">
                            <table id="u_body"
                                style="
                    border-collapse: collapse;
                    table-layout: fixed;
                    border-spacing: 0;
                    vertical-align: top;
                    min-width: 320px;
                    margin: 0 auto;
                    width: 100%;
                  "
                                cellpadding="0" cellspacing="0">
                                <tbody style="min-width: 320px">
                                    <tr>
                                        <div
                                            style="
                          text-align: center;
                          background-color: #ae0a46;
                          padding: 0.9375rem;
                        ">
                                            <a class="" href="www.dadabhaai.com"
                                                style="
                            color: #ffff;
                            font-size: 1.125rem;
                            text-align: center;
                            letter-spacing: 4px;
                          ">www.dadabhaai.com</a>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Email Footer End-->
                    </div>
                    <!-- ... -->
                </section>
            </td>
        </tr>
    </table>
</body>

</html>
