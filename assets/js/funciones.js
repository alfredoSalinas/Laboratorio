function imprimir(elemento){
    var ventana = window.open('', 'PRINT', 'height=400,width=600,location=no,toolbar=no');
    ventana.document.write('<html><head><title>' + document.title + '</title>');
    ventana.document.write('<style media="print" >');
    ventana.document.write('@media print{ @page { size: A4; /* DIN A4 standard, Europe */ margin:0; } html, body {  } body { padding-top:1mm; } }');
    ventana.document.write('</style>');
    ventana.document.write('</head><body>');
    ventana.document.write(elemento.innerHTML);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.close();
    ventana.onload = function() {
      ventana.print();
      
    }
    
    return true;
  }