<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{ config('app.name') }} Receipt.</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body {
    margin: 0;
    padding: 0;
    background: #e1e1e1;
  }
  div,
  p,
  a,
  li,
  td {
    -webkit-text-size-adjust: none;
  }
  .ReadMsgBody {
    width: 100%;
    background-color: #ffffff;
  }
  .ExternalClass {
    width: 100%;
    background-color: #ffffff;
  }
  body {
    width: 100%;
    height: 100%;
    background-color: #e1e1e1;
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
  }
  html {
    width: 100%;
  }
  p {
    padding: 0 !important;
    margin-top: 0 !important;
    margin-right: 0 !important;
    margin-bottom: 0 !important;
    margin-left: 0 !important;
  }
  .visibleMobile {
    display: none;
  }
  .hiddenMobile {
    display: block;
  }

  @media only screen and (max-width: 600px) {
    body {
      width: auto !important;
    }
    table[class="fullTable"] {
      width: 96% !important;
      clear: both;
    }
    table[class="fullPadding"] {
      width: 85% !important;
      clear: both;
    }
    table[class="col"] {
      width: 45% !important;
    }
    .erase {
      display: none;
    }
  }

  @media only screen and (max-width: 420px) {
    table[class="fullTable"] {
      width: 100% !important;
      clear: both;
    }
    table[class="fullPadding"] {
      width: 85% !important;
      clear: both;
    }
    table[class="col"] {
      width: 100% !important;
      clear: both;
    }
    table[class="col"] td {
      text-align: left !important;
    }
    .erase {
      display: none;
      font-size: 0;
      max-height: 0;
      line-height: 0;
      padding: 0;
    }
    .visibleMobile {
      display: block !important;
    }
    .hiddenMobile {
      display: none !important;
    }
  }
</style>

<!-- Header -->
<table
  width="100%"
  border="0"
  cellpadding="0"
  cellspacing="0"
  align="center"
  class="fullTable"
  bgcolor="#e1e1e1"
>
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td>
      <table
        width="600"
        border="0"
        cellpadding="0"
        cellspacing="0"
        align="center"
        class="fullTable"
        bgcolor="#ffffff"
        style="border-radius: 10px 10px 0 0"
      >
        <tr class="hiddenMobile">
          <td height="40"></td>
        </tr>
        <tr class="visibleMobile">
          <td height="30"></td>
        </tr>

        <tr>
          <td>
            <table
              width="480"
              border="0"
              cellpadding="0"
              cellspacing="0"
              align="center"
              class="fullPadding"
            >
              <tbody>
                <tr>
                  <td>
                    <table
                      width="440"
                      border="0"
                      cellpadding="0"
                      cellspacing="0"
                      align="center"
                      class="col"
                    >
                      <tbody>
                        <tr>
                          <td align="center">
                              
                            <img
                              src="{{asset('images/logo.png')}}" 
                              alt="ourinfoget"
                              width="32"
                              height="32"
                              alt="logo"
                              border="0"
                            />
                            
                          </td>
                        </tr> 
                        <tr class="hiddenMobile">
                          <td height="40"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="30"></td>
                        </tr>
                        <tr>
                          <td align="center" 
                          style="font-size: 20px;
                            font-weight:800;
                            font-family: 'Open Sans', sans-serif;
                            color: #f77716;
                            line-height: 18px;
                            vertical-align: top;
                            padding: 10px 0;">
                             Your REPORTVEHINFO Receipt
                          </td>
                        </tr> 
                        <tr>
                          <td width="100%" height="10"></td>
                        </tr>
                        <tr>
                          <td
                           align="center"
                            style="
                              font-size: 12px;
                              font-family: 'Open Sans', sans-serif;
                              color: #5b5b5b;
                              line-height: 20px;
                              vertical-align: top;
                            "
                          >
                            Receipt # {{$receipt['id']}}<br />
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
      </table>
    </td>
  </tr>
</table>
<!-- /Header -->
<!-- Information -->
<table
  width="100%"
  border="0"
  cellpadding="0"
  cellspacing="0"
  align="center"
  class="fullTable"
  bgcolor="#e1e1e1"
>
  <tbody>
    <tr>
      <td>
        <table
          width="600"
          border="0"
          cellpadding="0"
          cellspacing="0"
          align="center"
          class="fullTable"
          bgcolor="#ffffff"
        >
          <tbody>
            <tr>
              <td>
                <table
                  width="480"
                  border="0"
                  cellpadding="0"
                  cellspacing="0"
                  align="center"
                  class="fullPadding"
                >
                  <tbody>
                    <tr>
                      <td width="100%" height="20"></td>
                    </tr>
                    <tr>
                      <td>
                        <table
                          width="440"
                          border="0"
                          cellpadding="0"
                          cellspacing="0"
                          align="left"
                          class="col"
                        >
                          <tbody>
                            <tr>
                              <td
                                style="
                                  font-size: 11px;
                                  font-family: 'Open Sans', sans-serif;
                                  color: #5b5b5b;
                                  line-height: 1;
                                  vertical-align: top;
                                "
                              >
                                <strong>Amount Paid</strong>
                              </td>
                              <td
                                style="
                                  font-size: 11px;
                                  font-family: 'Open Sans', sans-serif;
                                  color: #5b5b5b;
                                  line-height: 1;
                                  vertical-align: top;
                                "
                              >
                                <strong>Receipt Date</strong>
                              </td>
                              <td
                                style="
                                  font-size: 11px;
                                  font-family: 'Open Sans', sans-serif;
                                  color: #5b5b5b;
                                  line-height: 1;
                                  vertical-align: top;
                                "
                              >
                                <strong>Payment Method</strong>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" width="100%" height="10"></td>
                            </tr>
                            <tr>
                              <td
                                style="
                                  font-size: 12px;
                                  font-family: 'Open Sans', sans-serif;
                                  color: #5b5b5b;
                                  line-height: 20px;
                                  vertical-align: top;
                                "
                              >
                                ${{number_format($receipt['amount'],2)}}
                              </td>
                              <td
                                style="
                                  font-size: 12px;
                                  font-family: 'Open Sans', sans-serif;
                                  color: #5b5b5b;
                                  line-height: 20px;
                                  vertical-align: top;
                                "
                              >
                                {{$receipt['created_at']}}
                              </td>
                              <td
                                style="
                                  font-size: 12px;
                                  font-family: 'Open Sans', sans-serif;
                                  color: #5b5b5b;
                                  line-height: 20px;
                                  vertical-align: top;
                                "
                              >
                                STRIPE
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
      </td>
    </tr>
  </tbody>
</table>
<!-- /Information -->

<!-- Order Details -->
<table
  width="100%"
  border="0"
  cellpadding="0"
  cellspacing="0"
  align="center"
  class="fullTable"
  bgcolor="#e1e1e1"
>
  <tbody>
    <tr>
      <td>
        <table
          width="600"
          border="0"
          cellpadding="0"
          cellspacing="0"
          align="center"
          class="fullPadding"
          bgcolor="#ffffff"
        >
          <tbody>
            <tr></tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table
                  width="480"
                  border="0"
                  cellpadding="0"
                  cellspacing="0"
                  align="center"
                  class="fullPadding"
                >
                  <tbody>
                    <tr>
                      <th
                        style="
                          font-size: 12px;
                          font-family: 'Open Sans', sans-serif;
                          color: #5b5b5b;
                          font-weight: normal;
                          line-height: 1;
                          vertical-align: top;
                          padding: 0 10px 7px 0;
                        "
                        width="52%"
                        align="left"
                      >
                        RVI History report
                      </th>
                      <td
                        align="right"
                        style="
                          font-size: 12px;
                          font-family: 'Open Sans', sans-serif;
                          color: #f77716;
                          line-height: 18px;
                          vertical-align: top;
                          padding: 10px 0;
                        "
                        class="article"
                      >
                        {{$receipt['vin']}}
                      </td>
                    </tr>
                    <tr>
                      <td
                        height="1"
                        style="background: #bebebe"
                        colspan="3"
                      ></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4"></td>
                    </tr>
                     <tr>
                      <th
                        style="
                          font-size: 12px;
                          font-family: 'Open Sans', sans-serif;
                          color: #5b5b5b;
                          font-weight: normal;
                          line-height: 1;
                          vertical-align: top;
                          padding: 0 10px 7px 0;
                        "
                        width="52%"
                        align="left"
                      >
                        Amount Paid
                      </th>
                      <td align="right"
                        style="
                          font-size: 12px;
                          font-family: 'Open Sans', sans-serif;
                          color: #f77716;
                          line-height: 18px;
                          vertical-align: top;
                          padding: 10px 0;
                        "
                        class="article"
                      >
                        ${{number_format($receipt['amount'],2)}}
                      </td>
                    </tr>
                    
                    <tr>
                      <td
                        height="1"
                        colspan="3"
                        style="border-bottom: 1px solid #e4e4e4"
                      ></td>
                    </tr>
                    <tr>
                      <td
                        height="20"
                        colspan="3"
                      ></td>
                    </tr>
                    <tr>
                      <td colspan="3" align="center">
                          <a href="{{url('invoice/'.$receipt['id'])}}" style="
                            background: cornflowerblue;
                            border-radius: 5px;
                            padding: 10px;
                            color: #fff;
                            text-decoration: none;
                            font-size: 16px;
                            font-weight: 600;
                            font-family: sans-serif;
                        ">View Receipt</a>
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
<!-- /Order Details -->

<!-- Disclamer -->
<table
  width="100%"
  border="0"
  cellpadding="0"
  cellspacing="0"
  align="center"
  class="fullTable"
  bgcolor="#e1e1e1"
  
>
  <tbody>
    <tr>
      <td>
        <table
          width="600"
          border="0"
          cellpadding="0"
          cellspacing="0"
          align="center"
          class="fullPadding"
          bgcolor="#ffffff"
          style="border-radius: 0 0 10px 10px; 
                        padding-bottom: 14px;"
        >
          <tbody>
            <tr></tr>
            <tr class="hiddenMobile">
              <td height="40"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="25"></td>
            </tr>
            <tr>
              <td>
                <table
                  width="480"
                  border="0"
                  cellpadding="0"
                  cellspacing="0"
                  align="center"
                  class="fullPadding"
                >
                  <tbody>
                    <tr>
                        <td style="
                            font-size: 12px;
                            font-family: 'Open Sans', sans-serif;
                            color: #5b5b5b;
                            line-height: 20px;
                        ">
                        The ${{number_format($receipt['amount'],2)}} payment will appear on your bank/card statement as: <br>
                            <strong style="text-tranform:capital;">
                                <!--{{$receipt['payment_method']}}-->
                                STRIPE.
                            </strong> **XFIN SERVICES LLC
                            </td>
                    </tr>
                    <tr>
                      <td height="20"></td>
                    </tr>
                    <tr>
                        <td style="
                            font-size: 12px;
                            font-family: 'Open Sans', sans-serif;
                            color: #5b5b5b;
                            line-height: 20px;
                        ">Best regards, <br>{{ config('app.name') }}
                        </td>
                        
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="10"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    <tr>
              <td height="30"></td>
            </tr>
  </tbody>
</table>
<!-- /Order Details -->
