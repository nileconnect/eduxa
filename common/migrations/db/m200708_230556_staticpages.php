<?php

use yii\db\Migration;

/**
 * Class m200708_230556_staticpages
 */
class m200708_230556_staticpages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('
        

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `page`
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(2048) NOT NULL,
  `title` varchar(512) NOT NULL,
  `body` text NOT NULL,
  `view` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of page
-- ----------------------------
INSERT INTO `page` VALUES (\'100\', \'how-we-work\', \'How we work\', \'\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title text-center\">How It Work</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mtsm\">\r\n					<div class=\"ptxlg prlg pllg pbxlg text-white bg-primary text-center\">\r\n						<div style=\"font-size:3em;height:88px;\"><i class=\"fas fa-search\"></i></div>\r\n						<h3>Search</h3>\r\n						<div class=\"mtmd\" style=\"color:#f0f0f0\">\r\n							Most people feel they have some basic flaws with their appearance, and the truth is that the stars \r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mtsm\">\r\n					<div class=\"ptxlg prlg pllg pbxlg text-white bg-primary text-center\">\r\n						<div style=\"font-size:3em;height:88px;\"><i class=\"fas fa-desktop\"></i></div>\r\n						<h3>Review & Compare</h3>\r\n						<div class=\"mtmd\" style=\"color:#f0f0f0\">\r\n							Most people feel they have some basic flaws with their appearance, and the truth is that the stars \r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mtsm\">\r\n					<div class=\"ptxlg prlg pllg pbxlg text-white bg-primary text-center\">\r\n						<div style=\"font-size:3em;height:88px;\"><i class=\"fab fa-wpforms\"></i></div>\r\n						<h3>Submit form</h3>\r\n						<div class=\"mtmd\" style=\"color:#f0f0f0\">\r\n							Most people feel they have some basic flaws with their appearance, and the truth is that the stars \r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\r\n\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"embed-responsive embed-responsive-16by9\">\r\n				<iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/zpOULjyy-n8?rel=0\" allowfullscreen></iframe>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\', \'\', \'1\', \'1564754243\', \'1594247844\');
INSERT INTO `page` VALUES (\'101\', \'terms\', \'Terms & Policy\', \'	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\', null, \'1\', \'1564754243\', \'1594248123\');
INSERT INTO `page` VALUES (\'102\', \'privacy\', \'Privacy\', \'	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\', null, \'1\', \'1564754243\', \'1594247586\');
INSERT INTO `page` VALUES (\'103\', \'contact\', \'Contact\', \'	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\', \'\', \'1\', \'1564754243\', \'1594248225\');
INSERT INTO `page` VALUES (\'104\', \'about\', \'about\', \'	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			\r\n			<div class=\"row mbxlg\">\r\n				<div class=\"col-sm-8 mbmd\">\r\n					<h3 class=\"title title-sm\">About Us</h3>\r\n					<div class=\"text-large\">\r\n						Differentiate and you stand out in a crowded marketplace. Present your uniqueness and emphasize your rare attributes in your sales copy and promotions and you’ll capture the imagination and interest of those you want to reach. In a world of copycats, it pays to be an original. It’s usually the creator of a new concept who gets the most mileage from it. Innovative entrepreneurs often become market leaders while competitors keep doing things the same old way. who gets the most mileage from it. Innovative entrepreneurs often become market leaders.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-4\">\r\n					<figure class=\"img\">\r\n						<img src=\"img/391.jpg\" alt=\"\">\r\n					</figure>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"row mblg\">\r\n				<div class=\"col-sm-6 mtmd mbmd\">\r\n					<h3 class=\"title title-sm\">Our Vision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n				<div class=\"col-sm-6 mbmd\">\r\n					<h3 class=\"title title-sm\">Out Mision</h3>\r\n					<div class=\"text-large\">\r\n						The power of testimonials can never be underestimated. People, especially nowadays, will only purchase products or avail services which have been referred to them by people whom they know. But most of the times, this is not an option that is in the hands of the business owner, he has to do the next best thing, which is to get testimonials from his past clients. Testimonials are living statements from past customers or clients which states  that they were satisfied by the product/ service. Every business must have testimonials.\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div>\r\n				<h3 class=\"title title-sm\">About The Company</h3>\r\n				<div class=\"text-large mbmd\">\r\n					This article is floated online with an aim to help you find the best dvd printing solution. Dvd printing is an important feature used by large and small DVD production houses to print information on DVDs. Actually, dvd printing is a labeling technique that helps to identify DVDs. Thus, dvd printing is essential part of your commercial DVD production.\r\n				</div>\r\n				<div class=\"text-large mbmd\">\r\n					Your DVDs usually come coated with directly printable lacquer films with ability to absorb ink, and the process of directly printing the lacquer films on your DVDs is technically known as dvd printing. Your dvd printing solution lies in – inkjet dvd printing, thermal transfer dvd printing, screen dvd printing, and offset dvd printing – which you may choose according to need and requirement. The printing process using CMYK Inkjet printers is known as inkjet printing. The inkjet dvd printing offers you the stunning results with high resolution and vibrant colors. The inkjet dvd printing is good choice for small runs of dvds, or when you need fast printing results. Inkjet dvd printing is not suited for large number of dvds, as it is uneconomical as compared to silkscreen cd printing, or lithographic cd printing.  The printing process based on melting a coating of colored ribbon onto your dvd surfaces is known as Thermal transfer dvd printing. The thermal transfer is a popular dvd printing technique that is cost effective for small runs and offers you the finishing superior even to lithographic dvd printing. The thermal transfer dvd printing offers fast and wonderful results, and thus it has grown very popular for small runs of DVDs. The printmaking technique that creates a sharp-edged image using stencils is known as screen printing. Screen printing is popular dvd printing technique suitable for large DVD runs. Screen dvd printing is a cost-effective method for larger quantities of DVDs. Screen dvd printing offers you the remarkable and vivid results. In screen dvd printing, your “per unit” costs significantly drop, when you order over 1000 units of DVDs. The printmaking technique where the inked image is transferred (or “offset”) from a plate to a rubber blanket, then to the printing surface is known as Offset printing, and it is known as Lithographic (Offset) printing, when used in combination with the lithographic process. It is widely popular dvd printing technique. Offset dvd printing is well suited for the high volumes of DVDs. Offset dvd printing offers you outstanding results and conspicuous images. This is the perfect option for over 1,000 units of DVDs. Your dvd printing and dvd printing services mainly depend on your needs and requirements. You may find a lot of dvd printing services. You can also hire dvd printing services online. You can find a number of online dvd printing companies offering you dvd printing services online.\r\n				</div>\r\n			</div>\r\n\r\n		</div>\r\n	</section>\r\n\r\n	\r\n	<section class=\"section\">\r\n		<div class=\"container\">\r\n			<h2 class=\"title\">Our offices</h2>\r\n\r\n			<div class=\"row\">\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/us.png\" alt=\"\"> USA</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">United States</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 444 Leon Lakes Apt. 288</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/fr.png\" alt=\"\"> France</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">France</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 738 Kunze Well</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n				<div class=\"col-sm-4 mbmd mtsm\">\r\n					<div class=\"text-large\"><img src=\"img/flags/de.png\" alt=\"\"> Germany</div>\r\n					<h3 class=\"text-primary mbsm mtxs\">Germany</h3>\r\n					<div class=\"text-large\"><i class=\"fas fa-map-marker-alt\"></i> 5309 Adell Row</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-phone-alt\"></i> 010XXXXX</div>\r\n					<div class=\"text-large\"><i class=\"fas fa-inbox\"></i> 123156</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</section>\', null, \'1\', null, \'1594248100\');
INSERT INTO `page` VALUES (\'105\', \'contact-ar\', \'اتصل بنا\', \'test\', null, \'1\', null, null);
INSERT INTO `page` VALUES (\'106\', \'privacy-ar\', \'سياسة الخصوصيه\', \'test\', null, \'1\', null, null);
INSERT INTO `page` VALUES (\'107\', \'terms-ar\', \'الشروط والاحكام\', \'test\', null, \'1\', null, \'1594247255\');
INSERT INTO `page` VALUES (\'108\', \'how-we-work-ar\', \'كيف  نعمل\', \'<p>test</p>\', null, \'1\', null, \'1594247262\');
INSERT INTO `page` VALUES (\'109\', \'about-us\', \'عنا\', \'	<section class=\"section\">\r\n		<div class=\"container\"> test test \r\n		</div>\r\n	</section>\', null, \'1\', null, \'1594249372\');
');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200708_230556_staticpages cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_230556_staticpages cannot be reverted.\n";

        return false;
    }
    */
}
