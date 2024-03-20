<?php include('up_header.php');
include("config.php");
if ($_SESSION['user_role'] != 9) {
  echo "<script>window.location.href='$hostname/admin/'</script>";
}
?>
<div class="container">
  <!-- Home Page Section Start -->
  <section>
    <div class="row">
      <div class="col-md-2 mt-4">
        <a style="background:#E1412E; border-radius: 12px; padding:6px 16px; color:white;" href="member.php"><i
            class="fa-solid fa-arrow-left"></i> Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 p-4  mt-4 mb-4" style="background: #fff; border: 1px solid gainsboro; border-radius: 24px;">
        <h4 style="color: #ff5733; text-align: left;">वाल्मीकि संगम डॉट कॉम के बारे में...</h4>
        <p><b>वाल्मिकी संगम</b> हमारे अपने बंधुओं के लिए निर्मित की गई एक भरोसेमंद वैवाहिक सेवा प्रदान करने का प्रयास
          मात्र है। जो परिजन अपने बेटे/बेटियों या परिचितों के लिए एक सुयोग्य और अपने समकक्ष जीवन साथी की तलाश कर रहे
          हैं,उनके लिए हमारे सभी स्वजनों को एक ही मंच पर लाने का और अटूट पारिवारिक बंधन से जोड़ने का प्रयास है। सिर्फ
          वैवाहिक सेवाएं ही नही अपितु एक परिवार की तरह समग्र व्यवस्थाएं सुलभ कराने का भागीरथी प्रयास है। इसमें उपलब्ध
          वर/कन्या की जानकारी पूर्णतः गोपनीय रखी जाती है। किसी एक पक्ष के द्वारा उपलब्ध जानकारी के आधार पर कन्या/वर के
          चयन के बाद हमारे माध्यम से ही अन्य जानकारियों का आदान प्रदान और परिचय उपलब्ध कराया जाएगा। हम आपको आत्मविश्वास
          के साथ अगला कदम उठाने में मदद करने के लिए सिर्फ एक सेतु की भूमिका निभा रहे हैं।और आपको भरोसेमंद विस्तृत
          पारिवारिक और अन्य पृष्ठभूमि की जानकारी प्रदान करने हेतु संकल्पित हैं।
          <br>आपकी विश्वसनीयता और भरोसा ही हमारी पूंजी है। वाल्मीकि संगम आपके अपनों के लिए सफल सुखद वैवाहिक जीवन को
          कामना हमेशा करता है।
        </p>
      </div>
      <div class="offset-md-1 col-md-3 p-4  mt-4 mb-4"
        style="background: #fff; border: 1px solid gainsboro; border-radius: 24px;">
        <h5 style="color: #ff5733;">सोशल मीडिया</h5>
        <p style="font-size:14px; font-weight: 500; line-height: 25px" class="mt-4">
          <i class="fab fa-youtube"
            style="color: #ff5733; font-size: 14px;  padding:5px; border: 1px solid #ff5733; border-radius:50%; margin-right: 4px;"></i>
          valmikisangam
        </p>
        <p style="font-size:14px; font-weight: 500; line-height: 25px" class="mt-4">
          <i class="fab fa-facebook-f"
            style="color: #ff5733; font-size: 14px;  padding:5px 8px; border: 1px solid #ff5733; border-radius:50%; margin-right: 4px;"></i>
          valmikisangam
        </p>
        <p style="font-size:14px; font-weight: 500; line-height: 25px" class="mt-4">
          <i class="fab fa-twitter"
            style="color: #ff5733; font-size: 14px; padding:5px; border: 1px solid #ff5733; border-radius:50%; margin-right: 4px;"></i>
          valmikisangam
        </p>
        <p style="font-size:14px; font-weight: 500; line-height: 25px" class="mt-4">
          <i class="fab fa-whatsapp"
            style="color: #ff5733; font-size: 14px; padding:5px; border: 1px solid #ff5733; border-radius:50%; margin-right: 4px;"></i>
          +91 8109436003
        </p>
      </div>
    </div>
  </section>
  <!-- Home Page Section End -->
</div>
<?php include('up_footer.php');