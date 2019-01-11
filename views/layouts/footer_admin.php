<footer id="footer"><!--Footer-->
<div class="index-shadow"></div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
				<div class="col-md-3">
					<h5>Информация</h5>
					<ul class="foot-menu">
						<li><a href="#">Каталог</a></li>
						<li><a href="#">Оплата</a></li>
						<li><a href="#">О компании</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-contact">
					<h5>Контакты</h5>  
					<ul>
						<li><img src="/phpShop/template/images/home/mts.png" alt="МТС"><span>+375(29)</span> 567-61-37</li>
						<li><img src="/phpShop/template/images/home/velcom.png" alt="velcom"><span>+375(29)</span> 658-76-78</li>
						<li><img src="/phpShop/template/images/home/velcom.png" alt="Velcom"><span>+375(29)</span> 106-81-08</li>
						<li><img src="/phpShop/template/images/home/mail.png" alt="Email"><a href="mailto:yakalexander@yandex.ru">yakalexander@yandex.ru</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-contact2">
					<h5>Наши магазины</h5>  
					<ul>
						<li>г. Минск, ул. Тимирязева, 121г рынок Ждановичи, павильоны 41, 43</li>
						<li>г. Борисов, ул. Лопатина, 6 рынок «Старый город»</li>
					</ul>
				</div>
				<div class="col-md-3 copyright-block">
					<h5>&nbsp;</h5> 
					<ul>
						<li>ЧТУП "ФАРБА SHOPPER", <span class="year"></span></li>
						<li>© Все права защищены.</li>
					</ul>
				</div>
			</div>
        </div>
    </div>
</footer>


<script src="/phpShop/template/js/jquery.js"></script>
<script src="/phpShop/template/js/jquery.cycle2.min.js"></script>
<script src="/phpShop/template/js/jquery.cycle2.carousel.min.js"></script>
<script src="/phpShop/template/js/bootstrap.min.js"></script>
<script src="/phpShop/template/js/jquery.scrollUp.min.js"></script>
<script src="/phpShop/template/js/price-range.js"></script>
<script src="/phpShop/template/js/jquery.prettyPhoto.js"></script>
<script src="/phpShop/template/js/main.js"></script>
<script src="/phpShop/template/js/admin.js"></script>
<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>

</body>
</html>