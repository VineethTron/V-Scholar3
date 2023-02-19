function display(id){
    let image = document.getElementById("imagedisplayid");
    // docoument.getElementById("imgid").style.display="none";

    if(id == "gate"){
        image.src="images/gate.png";
    }

    else if(id == "mba"){
        image.src="images/mba.png"
    }

    else if(id == "masters"){
        image.src="images/ms.png"
    }

    else if(id == "employement"){
        image.src="images/job.png"
    }

    else if(id == "software"){
        image.src="images/software.png"
    }

    else if(id == "entrepreneurship"){
        image.src="images/entrepreneurship.png"
    }    
}
