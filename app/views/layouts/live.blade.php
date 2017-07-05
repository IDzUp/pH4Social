@include('live.header')

<div class="crumb_navigation"> Navigation: <span class="current">Home</span></div>
<div class="left_content">
    <div class="title_box">Categories</div>
    <ul class="left_menu">
        <li class="odd"><a href="{{URL::to('site');}}">Processors</a></li>
        <li class="even"><a href="{{URL::to('site');}}">Motherboards</a></li>
        <li class="odd"><a href="/">Desktops</a></li>
        <li class="even"><a href="{{URL::to('site');}}">Laptops &amp; Notebooks</a></li>
        <li class="odd"><a href="{{URL::to('site');}}">Processors</a></li>
        <li class="even"><a href="{{URL::to('site');}}">Motherboards</a></li>
        <li class="odd"><a href="{{URL::to('site');}}">Processors</a></li>
        <li class="even"><a href="{{URL::to('site');}}">Motherboards</a></li>
        <li class="odd"><a href="{{URL::to('site');}}">Desktops</a></li>
        <li class="even"><a href="{{URL::to('site');}}">Laptops &amp; Notebooks</a></li>
        <li class="odd"><a href="{{URL::to('site');}}">Processors</a></li>
        <li class="even"><a href="{{URL::to('site');}}">Motherboards</a></li>
    </ul>
    <div class="title_box">Special Products</div>
    <div class="border_box">
        <div class="product_title"><a href="details.html">Motorola 156 MX-VL</a></div>
        <div class="product_img"><a href="details.html"><img src="../images/laptop.png" alt="" border="0"/></a></div>
        <div class="prod_price"><span class="reduce">350$</span> <span class="price">270$</span></div>
    </div>
    <div class="title_box">Newsletter</div>
    <div class="border_box">
        <input type="text" name="newsletter" class="newsletter_input" value="your email"/>
        <a href="{{URL::to('site');}}" class="join">join</a></div>
    <div class="banner_adds"><a href="{{URL::to('site');}}"><img src="../images/bann2.jpg" alt="" border="0"/></a></div>
</div>
<!-- end of left content -->
<div class="center_content">
    <div class="center_title_bar">Latest Products</div>


    @yield('content')


</div>
<!-- end of center content -->
@yield('sidebar')



<!-- end of right content -->
</div>
<!-- end of main content -->
<div class="footer">
    <div class="left_footer"><img src="../images/footer_logo.png" alt="" width="170" height="49"/></div>
    <div class="center_footer"> Template name. All Rights Reserved 2008<br/>
        <a href="http://csscreme.com"><img src="../images/csscreme.jpg" alt="csscreme" border="0"/></a><br/>
        <img src="../images/payment.gif" alt=""/></div>
    <div class="right_footer"><a href="{{URL::to('site');}}">home</a> <a href="{{URL::to('site');}}">about</a> <a
                href="http://www.free-css.com/">sitemap</a> <a href="{{URL::to('site');}}">rss</a> <a
                href="{{URL::to('site');}}">contact us</a></div>
</div>
</div>
<!-- end of main_container -->
</body>
</html>
