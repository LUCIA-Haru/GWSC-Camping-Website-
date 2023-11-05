<?php
include('Connection.php');

// RSSTable
// $RSS= "Create table RSSfeed(
//     RSSFeedID int NOT null Primary KEY Auto_Increment,
//     Title varchar(30),
//     Description text,
//     URL  varchar(255)
    
// )";

// $queryRSS = mysqli_query($connect,$RSS);

// if ($queryRSS) {
//     echo"RSS Table was Created";
// } else {
//     echo"Something went wrong";
// }


// Booking Table
// $Booking= "Create table booking(
//     BookingCodeNo int NOT null Primary KEY Auto_Increment,
//     PitchID int,  
//     CustomerID int,
//     BookingDate Date,
//     BookingStatus varchar(50),
//     UpdateEmail varchar(50),
//     UpdatePhoneNo varchar(50),
//     Quantity int,
//     PitchPricePerNight int,
//     PaymentType varchar(50),
//     CardNumber varchar(50),
//     TotalAmount int,
//     Tax int,
//     GrandTotal int,
//     Foreign Key(PitchID) References pitch(PitchID),
//     Foreign Key(CustomerID) References Customer(CustomerID)

// )";

// $queryBooking = mysqli_query($connect,$Booking);

// if ($queryBooking) {
//     echo"Booking Table was Created";
// } else {
//     echo"Something went wrong";
// }

//Pitch Table
// $Pitch= "Create table pitch(
//     PitchID int NOT null Primary KEY Auto_Increment,
//     PitchName varchar(50),
//     PitchLocation varchar(255),
//     PitchDescription varchar(100),
    
//     PitchStatus varchar(50),
//     PitchPricePerNight int,
//      PitchImg varchar(255),
//     LA_Names varchar(50),
//     LA_ImgURL1 varchar(255),
//     LA_ImgDescription1 varchar(100), 
//     LA_ImgURL2 varchar(255),
//     LA_ImgDescription2 varchar(100),
//     LA_ImgURL3 varchar(255),
//     LA_ImgDescription3 varchar(100),
//     Feature1Name varchar(50),
//     FeaturesImg1 varchar(255),
//     Feature2Name varchar(50),
//     FeaturesImg2 varchar(255),
//     FeaturesDescription varchar(100),
//     FeaturesStatus varchar(50),
//     AdditionalCost int,
//     PTID int,
//     SiteCodeNo int,
//     Foreign Key(PTID) References PitchType(PTID),
//     Foreign Key(SiteCodeNo) References campsite(SiteCodeNo)
// )";

// $queryPitch = mysqli_query($connect,$Pitch);

// if ($queryPitch) {
//     echo"Pitch Table was Created";
// } else {
//     echo"Something went wrong";
// }

// Reviews Table
// $Reviews= "Create table reviews(
//     ReviewsID int NOT null Primary KEY Auto_Increment,
//     Rating int,
//     Feedback varchar(100),
//     ReviewDate Date,
//     CustomerID int,
//     Foreign Key(CustomerID) References Customer(CustomerID)
// )";

// $queryReviews = mysqli_query($connect,$Reviews);

// if ($queryReviews) {
//     echo"Reviews Table was Created";
// } else {
//     echo"Something went wrong";
// }

// ContactTable
// $Contact= "Create table contact(
//     InquiryID int NOT null Primary KEY Auto_Increment,
//     CustomerID int,
//     CustomerSubject varchar(30),
//     CustomMeressage varchar(255),
//     InquiryDate Date,
//     Foreign Key(CustomerID) References Customer(CustomerID)
// )";

// $queryContact = mysqli_query($connect,$Contact);

// if ($queryContact) {
//     echo"Contact Table was Created";
// } else {
//     echo"Something went wrong";
// }

//Campsite Table
// $Campsite= "Create table campsite(
//     SiteCodeNo int NOT null Primary KEY Auto_Increment,
//     SiteName varchar(30),
//     SiteLocation varchar(255),
//     SiteDescription  varchar(50),
//     SiteImg varchar(255),
//     SiteStatus varchar(30) 
// )";

// $queryCampsite = mysqli_query($connect,$Campsite);

// if ($queryCampsite) {
//     echo"Campsite Table was Created";
// } else {
//     echo"Something went wrong";
// }

// PitchType Table
// $PitchType= "Create table PitchType(
//     PTID int NOT null Primary KEY Auto_Increment,
//     PTName varchar(30),
//     PTDescription varchar(30),
//     PTStatus  varchar(30),
//     PetFriendly varchar(30), 
//     Swimming varchar(30) 
// )";

// $queryPitchType = mysqli_query($connect,$PitchType);

// if ($queryPitchType) {
//     echo"PitchType Table was Created";
// } else {
//     echo"Something went wrong";
// }

//Customer Table
// $Customer= "Create table Customer(
//     CustomerID int NOT null Primary KEY Auto_Increment,
//     CustomerUsername varchar(30),
//     CustomerEmail varchar(30),
//     CustomerPassword  varchar(30),
//     CustomerPhoneNo int,
//     CustomerFirstName varchar(30),
//     CustomerLastName varchar(30),
//     CustomerNRC varchar(30),
//     CustomerAddress varchar(30),
//     ViewCounts int 
// )";

// $queryCustomer = mysqli_query($connect,$Customer);

// if ($queryCustomer) {
//     echo"Customer Table was Created";
// } else {
//     echo"Something went wrong";
// }

//Admin Table
// $Admins= "Create table Admins(
//     AdminID int NOT null Primary KEY Auto_Increment,
//     AdminUserName varchar(30),
//     AdminEmail varchar(30),AdminPassword varchar(30),
//     AdminPhoneNO int,
//     AdminFullName varchar(30),
//     AdminNRC varchar(30),
//     AdminAddress varchar(30)  
// )";

// $queryAdmins = mysqli_query($connect,$Admins);

// if ($queryAdmins) {
//     echo"Admins Table Created";
// } else {
//     echo"Something went wrong";
// }
?>