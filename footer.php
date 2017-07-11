	<footer class="footer-distributed">
		<div class="footer-left">
			<h3>Android<span>Games</span></h3>
			<p class="footer-links">
				<a href="login.php">login</a>·<a href="register.php">Register</a>
			</p>
			<p class="footer-company-name">androidgames &copy; 2017</p>
		</div>
		<div class="footer-center">
			<div>
				<i class="fa fa-map-marker"></i>
				<p><span>xxxxxx</span> xxx, xxx</p>
			</div>
			<div>
				<i class="fa fa-phone"></i>
				<p>+x xxx xxxxxx</p>
			</div>
			<div>
				<i class="fa fa-envelope"></i>
				<p><a href="mailto:support@androidgames.com">support@androidgames.com</a></p>
			</div>
		</div>
		<div class="footer-right">
			<p class="footer-company-about">
				<span>About the company</span>
				Over-world creation and navigation , Character and Monster classes using JSON (JavaScript Object Notation),Technical use of GML's Data Structures
			</p>
			<div class="footer-icons">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-linkedin"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>
		</div>
	</footer>
	<Script>
	$('.mobile').on('keydown',function(e){
	  if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	      (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
	      (e.keyCode >= 35 && e.keyCode <= 40)) {
	           return;
	  }
	  if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	      e.preventDefault();
	  }
	});
	</script>
</body>
</html>
