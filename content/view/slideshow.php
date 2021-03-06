<script type="text/javascript" src="style/js/slideshow.js"></script>
<script type="text/javascript" src="style/js/third-party/swfobject.js"></script>

<div id="slideshow">
    <div class="container">
		<div class="slide" id="slide-0" style="background-image: url('style/images/slide/1.jpg'); "></div>
			<div class="slide" id="slide-1" style="background-image: url('style/images/slide/2.jpg'); display: none;"></div>
				<div class="slide" id="slide-2" style="background-image: url('style/images/slide/3.jpg'); display: none;"></div>
					<div class="slide" id="slide-3" style="background-image: url('style/images/slide/4.jpg'); display: none;"></div>
						<div class="slide" id="slide-4" style="background-image: url('style/images/slide/5.jpg'); display: none;"></div>
	</div>

	<div class="paging">
		<a href="javascript:;" id="paging-0" onclick="Slideshow.jump(0, this);" onmouseover="Slideshow.preview(0);" class="current"></a>
			<a href="javascript:;" id="paging-1" onclick="Slideshow.jump(1, this);" onmouseover="Slideshow.preview(1);"></a>
				<a href="javascript:;" id="paging-2" onclick="Slideshow.jump(2, this);" onmouseover="Slideshow.preview(2);"></a>
					<a href="javascript:;" id="paging-3" onclick="Slideshow.jump(3, this);" onmouseover="Slideshow.preview(3);"></a>
						<a href="javascript:;" id="paging-4" onclick="Slideshow.jump(4, this);" onmouseover="Slideshow.preview(4);" class=" last-slide"></a>
	</div>
		
	<div class="caption">
		<h3><a href="#" class="link"><?php echo $array_site['slide1_titre']; ?></a></h3>
		<?php echo $array_site['slide1_desc']; ?>
	</div>

	<div class="preview"></div>
	<div class="mask"></div>
</div>

<script type="text/javascript">
	//<![CDATA[
        $(function() {
            Slideshow.initialize('#slideshow', [
                {
					image: "style/images/slide/1.jpg",
					desc: "<?php echo $array_site['slide1_desc']; ?>",
                    title: "<?php echo $array_site['slide2_titre']; ?>",
                    url: "",
					id: "1"
                },
                {
					image: "style/images/slide/2.jpg",
					desc: "<?php echo $array_site['slide2_desc']; ?>",
                    title: "<?php echo $array_site['slide2_titre']; ?>",
                    url: "",
					id: "2"
                },
                {
					image: "style/images/slide/3.jpg",
					desc: "<?php echo $array_site['slide3_desc']; ?>",
                    title: "<?php echo $array_site['slide3_titre']; ?>",
                    url: "",
					id: "3"
                },
                {
					image: "style/images/slide/4.jpg",
					desc: "<?php echo $array_site['slide4_desc']; ?>",
                    title: "<?php echo $array_site['slide4_titre']; ?>",
                    url: "",
					id: "4"
                },
				{
					image: "style/images/slide/5.jpg",
					desc: "<?php echo $array_site['slide5_desc']; ?>",
                    title: "<?php echo $array_site['slide5_titre']; ?>",
                    url: "",
					id: "5"
                },
                {
					image: "style/images/slide/6.jpg",
					desc: "<?php echo $array_site['slide6_desc']; ?>",
                    title: "<?php echo $array_site['slide6_titre']; ?>",
                    url: "",
					id: "6"
				}
            ]);

        });
	//]]>
</script>