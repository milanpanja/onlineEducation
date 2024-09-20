<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <samp>'.$message.'</samp>
                <i class="bx bx-x" onclick="this.parentElement.remove();"></i>
        </div> ';
    }
}
?>

<header>
    <section class="flex">
        <a href="dasboard.php"> <img src="../image/logo.png" width="130px"></a>
        <form action="search_page.php" method="post" class="search-form">
          <input type="text" name="search" placeholder="search here.." require maxlength="100">
          <button type="submit" class="bx bx-search-alt-2" name="search_btn"></button>
        </form>
        <div class="icons">
            <div id="menu-btn" class="bx bx-list-plus"></div>
            <div id="search-btn" class="bx bx-search-alt-2-plus"></div>
            <div id="user-btn" class="bx bxs-user"></div>
        </div>
        <div class="profile">
            <?php
                
                $select_profile= $con->prepare("SELECT * FROM 'tutors' WHERE id= ? ");
                $select_profile->execute([$tutor_id]);
                if ($select_profile->rowCount()>0){
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

                
            ?>
            <img src="../uploaded_files/<?=$fetch_profile['image'];?>">
            <h3><?=$fetch_profile['name'];?></h3>
            <span><?=$fetch_profile['profession']; ?></span><br>
          <div id="flex-btn">
             <a href="profile.php" class="btn">view profile</a>
             <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="btn">logout</a>
          </div>
          <?php
        
            }else{

          ?>
         <h3>please login or register</h3>
         <div id="flex-btn">
            <a href="login.php" class="btn">login</a>
            <a href="register.php" class="btn">resiter</a>
         </div>
         <?php } ?>
        </div>
    </section>
</header>

<div class="side-bar">
    <div class="profile">
        <?php
        $select_profile=$con->prepare("SELECT * FROM 'tutors' WHERE id= ?");
        $select_profile->execute([$tutor_id]);
        if ($select_profile->rowCount()>0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);


        ?>
        <img src="../uploaded_files/<?=$fetch_profile['image'];?>">
        <h3><?=$fetch_profile['name'];?></h3>
        <p><?=$fetch_profile['profession'];?></p>
        <a href="profile.php" class="btn">view profile</a>
        <?php }else{ ?>
            <h3>please login or register</h3>
         <div id="flex-btn">
            <a href="login.php" class="btn">login</a>
            <a href="register.php" class="btn">resiter</a>
         </div>
         <?php }?>
    </div>
    <nav class="navbar">
        <a href="dasboard.php"><i class="bx bxs-home-heart"></i><span>home</span></a>
        <a href="playlists.php"><i class="bx bxs-receipt"></i><span>playlist</span></a>
        <a href="contents.php"><i class="bx bxs-graduation"></i><span>contents</span></a>
        <a href="dasboard.php"><i class="bx bxs-home-heart"></i><span>home</span></a>
        <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');"><i class="bx bx-log-in-circle"></i><span>logout</span></a>
    </nav>
</div>