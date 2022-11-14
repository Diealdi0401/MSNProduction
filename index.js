var express = require("express");
var http = require("http");
var path = require("path");
var nodemailer = require("nodemailer");

var app = express();
var server = http.Server(app);
var port =500;

app.set("port", port);
app.use(express.json());
app.use(express.urlencoded({extended:true}));
app.use(express.static(path.join(__dirname, "static")));

// Routing
app.get("/", function(_req, response){
    response.sendFile(path.join(__dirname, "static/index.html"))
})

app.post("/send_email", function(req, response){
    //variabel yang menampung desain email yang akan dikirim
    var name = req.body.name;
    var email = req.body.from;
    var subject = req.body.subject;
    var message = req.body.message;
    var pesan = message +   "\n \n Detail pengirim : "+
                            "\n Nama Lengkap : "+name+
                            "\n Alamat Email : "+email;

    var transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'ramdanialdi0104@gmail.com',
            pass: 'cyaavfgzlwqpskrr'
        }
    });

    var mailOptions = {
        from: from,
        to: 'ramdanialdi889@gmail.com',
        subject: subject,
        text: pesan
    };

    transporter.sendMail(mailOptions, function(error, info){
        if (error){
            console.log(error)
        }else{
            console.log("Email Sent: "+info,response)
        }
        response.redirect("/")
    })
})

//Initialize Web Server
server.listen(port, function(){
    console.log("starting server on port "+port)
})
console.clear()