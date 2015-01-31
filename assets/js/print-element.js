
  
  function printIt(printThis,title)
  {

    var win=null;
    win = window.open();
    self.focus();
    win.document.open();
    
    win.document.write('<!DOCTYPE html>');
    win.document.write('<html><head>');
    win.document.write('<title>'+title+'</title>');
    //win.document.write('<link rel="stylesheet" href="print-element.css" type="text/css"/>');
   // win.document.write('<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"/>');
    //win.document.write('<link rel="stylesheet" href="bootstrap.min.css" type="text/css"/>');
    win.document.write('<style type="text/css">body {margin: 0;padding: 0;background-color: transparent;}* {box-sizing: border-box;-moz-box-sizing: border-box;}/*inti layout*/.kop img{top:10px;left:0px;}table td {padding-top :2px;padding-bottom :2px;}.page {width: 21cm;min-height: 33cm;padding: 0.5cm;margin: 1cm auto;border: 1px #D3D3D3 solid;border-radius: 5px;background: white;box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);}/*content dalam layout*/.subpage {font-family:"Times New Roman", Times, serif;padding: 10px;/*border: 1px red solid;*//*height: 237mm;*/min-height: 29.56cm; /* height page di kurangi 6 , knpa kalo 4 cm kalo diprint lebih*/ outline: auto yellow solid;/*background :red;*/}.row-line td {border-top: 1px solid black;}.row-line caption + thead tr:first-child td,.row-line colgroup + thead tr:first-child td,.row-line thead:first-child tr:first-child td {border-top: 0;}@page {size: F4;margin: 0;}@media print {.page {margin: 0;border: initial;border-radius: initial;width: initial;min-height: initial;box-shadow: initial;background: initial;page-break-after: always;}}.btn-print {border: 1px solid #ccc;border-radius: 8px;-webkit-border-radius: 8px;-moz-border-radius: 8px;top: 300px;left: 50%;margin: 0 0 0 -81px;position: fixed;padding: 5px 0;background: rgba(250, 250, 250, 0.75);}.btn-print a {color: #FFF;display: block;float: left;height: 32px;text-decoration: none; text-indent: -999em;width: 80px;}.btn-print a:hover {opacity: 0.75;}.btn-print a.print {background: url(print/images/icon-print.png) no-repeat 50% 50%;} #konten{background-color: #EEEEEE;}</style>');
    
    win.document.write('</head><body>');
    win.document.write(printThis);
    win.document.write('</body></html>');
    win.document.close();
     //win.location.reload(false);
    win.print();
    win.close();
    
    

  }
  
  function PrintElem(elem,title)
    {
        printIt($(elem).html(),title);
    }
    //<style type="text/css">/*inti layout*/.page {width: 21cm;min-height: 33cm;padding: 1cm;margin: 1cm auto;border: 1px #D3D3D3 solid;border-radius: 5px;background: white;box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);}/*content dalam layout*/.subpage {font-family:"Times New Roman", Times, serif;padding: 10px;/*border: 1px red solid;*//*height: 237mm;*/min-height: 29.56cm; /* height page di kurangi 6 , knpa kalo 4 cm kalo diprint lebih*/ outline: auto yellow solid;/*background :red;*/}.row-line td {border-top: 1px solid black;}.row-line caption + thead tr:first-child td,.row-line colgroup + thead tr:first-child td,.row-line thead:first-child tr:first-child td {border-top: 0;}@page {size: F4;margin: 0;}@media print {.page {margin: 0;border: initial;border-radius: initial;width: initial;min-height: initial;box-shadow: initial;background: initial;page-break-after: always;}}.btn-print {border: 1px solid #ccc;border-radius: 8px;-webkit-border-radius: 8px;-moz-border-radius: 8px;top: 300px;left: 50%;margin: 0 0 0 -81px;position: fixed;padding: 5px 0;background: rgba(250, 250, 250, 0.75);}.btn-print a {color: #FFF;display: block;float: left;height: 32px;text-decoration: none; text-indent: -999em;width: 80px;}.btn-print a:hover {opacity: 0.75;}.btn-print a.print {background: url(print/images/icon-print.png) no-repeat 50% 50%;} #konten{background-color: #EEEEEE;}</style>