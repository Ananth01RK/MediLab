<?php
	$title = "Dashboard";
	require_once($_SERVER["DOCUMENT_ROOT"]."/user_page/header.php");
	
	//Contact
	if(isset($_POST["contact_submit"])){
		$_POST = array_map("trim", $_POST);
        $_POST = array_map("htmlspecialchars", $_POST);
        extract($_POST);
		$cont_created_by = trim($_SESSION["user_id"]);
		
		$sql = "INSERT INTO contact(cont_name,cont_email,cont_phone_number,cont_subject,cont_message,cont_created_by,cont_creation_timestamp)VALUES(:cont_name,:cont_email,:cont_phone_number,:cont_subject,:cont_message,:cont_created_by,NOW())";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":cont_name", $cont_name);
		$stmt->bindParam(":cont_email", $cont_email);
		$stmt->bindParam(":cont_phone_number", $cont_phone_number);
		$stmt->bindParam(":cont_subject", $cont_subject);
		$stmt->bindParam(":cont_message", $cont_message);
		$stmt->bindParam(":cont_created_by", $cont_created_by);
		
		if($stmt->execute())
		{
			echo "<script>alert('Success');</script>";
		}
		else
		{
			$_SESSION["error_message"][] = "Failure.";
		}
		
		echo "<script>window.location='".$_SERVER["PHP_SELF"]."';</script>";
		exit(0);
	}
	//Appointment
	if(isset($_POST["appointment_submit"]))
	{
		$_POST = array_map("trim", $_POST);
		$_POST = array_map("htmlspecialchars", $_POST);
		extract($_POST);
		$apt_created_by = trim($_SESSION["user_id"]);
		
		$sql = "INSERT INTO appointment(apt_name,apt_phone_number,apt_date,apt_time,apt_created_by,apt_creation_timestamp)VALUES(:apt_name,:apt_phone_number,:apt_date,:apt_time,:apt_created_by,NOW())";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(":apt_name", $apt_name);
		$stmt->bindParam(":apt_phone_number", $apt_phone_number);
		$stmt->bindParam(":apt_date", $apt_date);
		$stmt->bindParam(":apt_time", $apt_time);
		$stmt->bindParam(":apt_created_by", $apt_created_by);
		
		if($stmt->execute())
		{
			$_SESSION["success_message"][] = "Appointment Booked.";
		}
		else
		{
			$_SESSION["error_message"][] = "Failure.";
		}
		
		echo "<script>window.location='".$_SERVER["PHP_SELF"]."';</script>";
		exit(0);
	}
 ?>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Services</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Breast Pain</h4>
                        <p class="text-muted">What causes Breast Pain??<br>	Breast pain is any discomfort, tenderness, or pain in the breast or underarm region.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Self exam</h4>
                        <p class="text-muted">Adult women of all ages are encouraged to perform breast self-exams at least once a month.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Classification</h4>
                        <p class="text-muted">A mammogram is an x-ray that allows a qualified specialist to examine the breast tissue.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="appointment">
            <div class="container">
				<?php require_once($_SERVER["DOCUMENT_ROOT"]."/user_page/view_messages_and_error.php"); ?>
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Appointment</h2>
                    <h3 class="section-subheading text-muted">Enter the following details to book an appointment</h3>
                </div>
				<form id="" name="" novalidate=""action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="apt_name" name="apt_name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name." />
                                
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="apt_phone_number" name="apt_phone_number" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number." />
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="apt_date" name="apt_date" type="date" placeholder="Date *" required data-validation-required-message="Please enter Date for your appointment." />
                                
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="apt_time" type="time" name="apt_time" placeholder="Time *" required data-validation-required-message="Please enter Time for your appointment.">
                                
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="appointment_submit" name="appointment_submit" type="submit" >Make Appointment</button>
                    </div>
                </form>
                
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">About</h2>
                    <h3 class="section-subheading text-muted">Breast Cancer Facts</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/breast_facts.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">What is Breast Cancer?</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Breast cancer is a disease in which malignant (cancer) cells form in the tissues of the breast. </p></div>
							<a href="https://www.nationalbreastcancer.org/what-is-breast-cancer/" target="_blank"><button type="submit"  value="Read More" class="btn btn-primary text-uppercase">Read More</button></a>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/breast_anatomy.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Breast Anatomy</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">As you learn about breast cancer, we will repeatedly reference the anatomy of the breast. Understanding the different parts and functions will help you better grasp the details of breast cancer!</p></div>
							<a href="https://www.nationalbreastcancer.org/breast-anatomy" target="_blank"><button type="submit"  value="Read More" class="btn btn-primary text-uppercase">Read More</button></a>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/stages.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Stages</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Once a person is determined to have a malignant tumor or the diagnosis of breast cancer, the healthcare team will determine breast cancer staging to communicate how far the disease has progressed.</p></div>
							<a href="https://www.nationalbreastcancer.org/breast-cancer-staging/" target="_blank"><button type="submit" value="Read More" class="btn btn-primary text-uppercase">Read More</button></a>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/diagonsis.png" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="subheading">Diagnosis</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Breast cancer can be diagnosed through multiple tests, including a mammogram, ultrasound, MRI and biopsy.</p></div>
							<a href="https://www.nationalbreastcancer.org/breast-cancer-diagnosis/" target="_blank"><button type="submit"  value="Read More" class="btn btn-primary text-uppercase">Read More</button></a>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                               <a style="text-decoration:none;color:white;"href="https://www.nationalbreastcancer.org/" target="_blank">Read<br>More</a>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
				<?php require_once($_SERVER["DOCUMENT_ROOT"]."/user_page/view_messages_and_error.php"); ?>
                <div class	="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Any queris? Feel Free to contact Us.</h3>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="cont_name" name="cont_name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="cont_email" name="cont_email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="cont_phone_number" name="cont_phone_number" type="tel" placeholder="Your Phone" required="" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="cont_subject" name="cont_subject" type="text" placeholder="Your Subject" required="" data-validation-required-message="Please enter your Subject." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group form-group-textarea mb-md-3">
                                <textarea class="form-control" id="cont_message" name="cont_message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="contact_submit" name="contact_submit" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/user_page/footer.php")
?>

<script type="text/javascript">
  
        $.growl.notice({ title: "Welcome to Medilab", message: "" });

</script>