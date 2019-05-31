 



$('document').ready(function(){

 private void sendImageWhatsApp(String phoneNumber, String nombreImagen) {
    try {
        Intent intent = new Intent("android.intent.action.MAIN");
        intent.setAction(Intent.ACTION_SEND);
        intent.setType("text/plain");
        intent.putExtra(Intent.EXTRA_STREAM, Uri.parse(Environment.getExternalStorageDirectory() + "/" + nombreImagen));
        intent.putExtra("jid", phoneNumber + "@s.whatsapp.net"); //numero telefonico sin prefijo "+"!
        intent.setPackage("com.whatsapp");
        startActivity(intent);
     } catch (android.content.ActivityNotFoundException ex) {
        Toast.makeText(getApplicationContext(), "Whatsapp no esta instalado.", Toast.LENGTH_LONG).show();
    }
}
}