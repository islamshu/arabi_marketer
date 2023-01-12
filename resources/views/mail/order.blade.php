<head>
    <style type="text/css">
      @import url(https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,700italic,900);
      body { font-family: 'Roboto', Arial, sans-serif !important; }
      a[href^="tel"]{
          color:inherit;
          text-decoration:none;
          outline:0;
      }
      a:hover, a:active, a:focus{
          outline:0;
      }
      a:visited{
          color:#FFF;
      }
      span.MsoHyperlink {
          mso-style-priority:99;
          color:inherit;
      }
      span.MsoHyperlinkFollowed {
          mso-style-priority:99;
          color:inherit;
      }
    </style>
  </head>
  @php
$order = App\Models\Order::find($order_id);
@endphp
  
  <body style="margin: 0; padding: 0;background-color:#EEEEEE;">
    <div style="display:none;font-size:1px;color:#333333;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;">
      Habt Ihr Fragen? Ruft uns unter 04221 97 44 77 an oder antwortet einfach auf diese Email | supplify.de
    </div>
    <table cellspacing="0" style="margin:0 auto; width:100%; border-collapse:collapse; background-color:#EEEEEE; font-family:'Roboto', Arial !important">
      <tbody>
        <tr>
          <td align="center" style="padding:20px 23px 0 23px">
            <table width="600" style="background-color:#FFF; margin:0 auto; border-radius:5px; border-collapse:collapse">
              <tbody>
                <tr>
                  <td align="center">
                    <table width="500" style="margin:0 auto">
                      <tbody>
  
                        <tr>
                          <td align="center" style="padding:40px 0 35px 0">
                            <a href="https://supplify.de/" target="_blank" style="color:#128ced; text-decoration:none;outline:0;"><img alt="" src="https://www.supplify.de/images/supplify_klein.jpg" border="0"></a>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" style="font-family:'Roboto', Arial !important">
                            <h2 style="margin:0; font-weight:bold; font-size:40px; color:#444; text-align:center; font-family:'Roboto', Arial !important">
                                شكرا لطلبك!
                                                                  </h2>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" style="padding:15px 0 20px 0; font-family:'Roboto', Arial !important">
                            <p style="margin:0; font-size:18px; color:#000; line-height:24px; font-family:'Roboto', Arial !important">
                                هذا بريد الكتروني يحتوي على طلبك
                            </p>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" style="padding-bottom:30px">
                            <table style="width:255px; margin:0 auto;">
                              <tbody>
                                <tr>
                                  <td width="255" style="background-color:#008AF1; text-align:center; border-radius:5px; vertical-align:middle; padding:13px 0">
                                    <a href="https://supplify.de/Mein-Konto">Bestellstatus</a>
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
                <tr>
                  <td align="center" cellspacing="0" style="padding:0 0 30px 0; vertical-align:middle">
                    <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border:1px solid #E5E5E5">
                      <tbody>
                        <tr>
                          <td width="276" style="vertical-align:top; border-right:1px solid #E5E5E5">
                            <table style="width:100%; border-collapse:collapse">
                              <tbody>
                                <tr>
                                  <td style="vertical-align:top; padding:18px 18px 8px 23px; font-family:'Roboto', Arial !important">
                                    <p style="font-size:16px; color:#333333; text-transform:uppercase; font-weight:900; margin:0; font-family:'Roboto', Arial !important">
                                      بيانات الطلبية :
                                    </p>
                                  </td>
                                </tr>
                                <tr style="">
                                  <td style="vertical-align:top; padding:0 18px 18px 23px">
                                    <table width="100%" style="border-collapse:collapse">
                                      <tbody>
                                        <tr>
                                            <td style="font-family:'Roboto', Arial !important">
                                              <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                رقم الطلب:
                                              </p>
                                            </td>
                                            <td align="left" style="font-family:'Roboto', Arial !important">
                                              <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                               {{ $order->code }}
                                              </p>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="font-family:'Roboto', Arial !important">
                                              <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                الاجمالي الطلب:
                                              </p>
                                            </td>
                                            <td align="left" style="font-family:'Roboto', Arial !important">
                                              <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                               {{ $order->total }}
                                              </p>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="font-family:'Roboto', Arial !important">
                                              <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                                طريقة الدفع :
                                              </p>
                                            </td>
                                            <td align="left" style="font-family:'Roboto', Arial !important">
                                              <p style="font-size:16px; color:#000; margin:0 0 10px 0; font-family:'Roboto', Arial !important">
                                               {{ $order->method_type }}
                                              </p>
                                            </td>
                                          </tr>
                                        <tr>
                                          <td style="font-family:'Roboto', Arial !important">
                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                            اسم صاحب الطلبية:
                                            </p>
                                          </td>
                                          <td align="left" style="font-family:'Roboto', Arial !important">
                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                              {{ $order->user->first_name.' '.$order->user->last_name }}
                                            </p>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="font-family:'Roboto', Arial !important">
                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                             البريد الاكتروني لصاحب الطلبية  :
                                            </p>
                                          </td>
                                          <td align="left" style="font-family:'Roboto', Arial !important">
                                            <p style="font-size:16px; color:#000; margin:0 0 5px 0; font-family:'Roboto', Arial !important">
                                                {{ $order->user->email }}
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
                  </td>
                </tr>
                <tr>
                  <td align="center" cellspacing="0" style="padding:0; vertical-align:middle">
                    <table width="550" style="border-collapse:collapse; background-color:#FaFaFa; margin:0 auto; border-bottom:1px solid #E5E5E5">
                      <tbody>
                        <tr>
                          <td width="380" align="left" style="padding:15px 0 15px 25px; font-family:'Roboto', Arial !important">
                            <p style="text-transform:uppercase;font-size:16px; color:#333333; margin:0; font-weight:400; font-family:'Roboto', Arial !important; ">
                              <span style="font-weight: 900;">  الخدمات المشتراه</span>
                            </p>
                          </td>
                          <td width="60" align="right" style="font-family:'Roboto', Arial !important">
                            <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:center;">
                              الخدمة</p>
                          </td>
                         
                          <td width="80" align="right" style="font-family:'Roboto', Arial !important;padding-right:10px;">
                            <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:right;">
                                الاضافات 
                            </td>
                            <td width="80" align="right" style="font-family:'Roboto', Arial !important;padding-right:10px;">
                                <p style="margin:0; font-size:14px; color:#333333;padding:0;font-family:'Roboto', Arial !important;text-align:right;">
                                    الاجمالي 
                                </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
  
                <tr>
                  <td style=" font-family:'Roboto', Arial !important;padding:0;" align="center">
                    <table width="550" style="border-collapse:collapse;margin: 0 auto;border-bottom: 1px solid #EBEBEB">
                      <tbody>
                        @foreach ($order->orderdetiles as $item)
                            @php
                                $service = App\Models\Service::find($item->product_id);
                            @endphp
                        <tr>
                          <td width="117" align="right" style="padding:24px 0 24px 10px; text-align:left;">
                            <a href="https://supplify.de/" target="_blank" style="text-decoration:none; color:#000; outline:0;">
                              <img src="{{ asset('public/uploads/'.$service->image) }}" width="150" height="100" border="0">
                            </a>
                          </td>
                          <td width="270" style="vertical-align:middle; padding:0 0 0 10px; font-family:'Roboto', Arial !important;">
                            <p style="font-size:16px; margin:0; color:#000; line-height:20px; font-family:'Roboto', Arial !important">
                              <a target="_blank" style="text-decoration:none; color:#000; outline:0;">
                                {{ $service->title }}
                            </a>
                            </p>
                           
                          </td>
                          <td align="center" width="60" style="vertical-align:middle; font-family:'Roboto', Arial !important;padding:0;">
                            <p style="font-size:18px; color:#000; margin:0; font-family:'Roboto', Arial !important;text-align:center;">
                                @php
                                    $extra = json_decode($item->extra_data);
                                @endphp
                                @if($extra != null)
                                @foreach ($extra as $item)
                                  {{ $item->title  }} ,  <br>
                                @endforeach
                                @else
                                _
                                @endif
                            </p>
                          </td>
                          <td align="center" width="80" style="font-family:'Roboto', Arial !important;padding:0 10px 0 0;">
                            
                            <p style="font-size:18px; color:#bc0101; margin:0; font-family:'Roboto', Arial !important;text-align:center;font-weight:bold;text-align: right;">
                           {{ $item->price }}
                            </p>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </td>
                </tr>
  
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align="center" style="padding-top:20px">
            <table width="604" style="border-collapse:collapse;background-color:#FFF; font-family:'Roboto', Arial !important; border-radius:5px">
              <tbody>
                <tr>
                  <td colspan="4" style="vertical-align:middle;background-color: #128ced;border-radius: 5px 5px 0 0;">
                    <table style="background-color:#128ced; width:100%; border-radius:5px 5px 0 0; border-collapse:collapse">
                      <tbody>
                        <tr>
                          <td align="center" style="vertical-align:middle; padding:22px 0; font-family:'Roboto', Arial !important">
                            <p style="color:#FFF; font-size:18px; margin:0; font-family:'Roboto', Arial !important">
                              Ruf uns an: <a href="tel:+4942219447744" target="_blank" style="text-decoration:none; color:#FFF; font-weight:bold;outline:0;">+49 (0)4221 944 77 44</a> oder antworte auf diese Email
                            </p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td style="padding:0">
                    <table cellpadding="20" style="width:100%; border-collapse:collapse">
                      <tbody>
                        <tr>
                          <td align="center" style="border-right:1px solid #EBEBEB; font-family:'Roboto', Arial !important">
                            <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=OrderConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                              <p style="margin:0 0 8px 0"><img src="https://www.chewy.com/static/cms/lp/email/csr_icon.png" border="0"></p>
                              <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                Kunden <br> Support
                              </p>
                            </a>
                          </td>
                          <td align="center" style="border-right:1px solid #EBEBEB; font-family:'Roboto', Arial !important; vertical-align:bottom">
                            <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=OrderConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                              <p style="margin:0 0 14px 0; font-family:'Roboto', Arial !important"><img src="https://www.chewy.com/static/cms/lp/email/shipping_icon.png" border="0"></p>
                              <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                Gratisversand <br> ab EUR49.00
                              </p>
                            </a>
                          </td>
                          <td align="center" style="border-right:1px solid #EBEBEB; font-family:'Roboto', Arial !important">
                            <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=OrderConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                              <p style="margin:0 0 8px 0"><img src="https://www.chewy.com/static/cms/lp/email/moneyback_icon.png" border="0">
                              </p>
                              <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                 Zufriedenheitsgarantie
                              </p>
                            </a>
                          </td>
                          <td align="center" style="font-family:'Roboto', Arial !important">
                            <a href="https://www.chewy.com?utm_medium=email&amp;utm_source=transactional&amp;utm_campaign=OrderConfirmation" target="_blank" style="outline:0;color:#128ced; text-decoration:none">
                              <p style="margin:0 0 8px 0"><img src="https://www.chewy.com/static/cms/lp/email/return_icon.png" border="0"></p>
                              <p style="color:#444; font-size:13px; text-transform:uppercase; margin:0; font-family:'Roboto', Arial !important">
                                Sonstige <br> Features
                              </p>
                            </a>
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
  </body>