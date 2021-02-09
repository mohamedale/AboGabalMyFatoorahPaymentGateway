<h1>AboGabalMyFatoorah, V1.0</h1>
<p>MyFatoorah Payment Gateway simple php library.</p>

- At first this application is not affiliated 
   with the company that owns this Payment gateway
   
**<h3>How to run our app for test.</h3>**
- just download our app then put it in your local server projects source and run it on your local server, finally open`localhost` in your browser and start testing.
   
**<h3>How To Integration.</h3>**
 * For all classes that available in our scale you can load it by include `config/config.php` And `src/autoload.php` then run our classes as follows: <br>
1- `initiatePayment` Class, this step will simply return you all available <a href="https://myfatoorah.readme.io/docs/payment-methods">Payment Methods</a> for the account with the actual charge that the customer will pay on the gateway. <a href="https://myfatoorah.readme.io/docs/api-initiate-payment"> Example for request and response</a>.<br> 
2- `executePayment` Class, once the payment has been initiated, this step will do execute the actual transaction creation at MyFatoorah platform and will return to your application the URL to redirect your customer to make the payment. <a href="https://myfatoorah.readme.io/docs/api-execute-payment">Example for request and response</a>.<br>
3- `checkoutPayment` Class, these class will checkout your purchase process. <a href="https://myfatoorah.readme.io/docs/api-direct-payment">Example for request and response</a>.<br>
4- `paymentEnquiry` Class, finally these class get your payment status and all information that you put it and the api response of billing status after confirm your payment process. <a href="https://myfatoorah.readme.io/docs/api-payment-enquiry">Example for request and response</a>.<br>
  
**<h3>For test apis away from our app.</h3>**
- Please visit this <a href="https://apitest.myfatoorah.com/swagger/ui/index#/Payment">link</a>.

**<h3>Demo information.</h3>**
- Url: `https://apitest.myfatoorah.com`
- Api key: `Tfwjij9tbcHVD95LUQfsOtbfcEEkw1hkDGvUbWPs9CscSxZOttanv3olA6U6f84tBCXX93GpEqkaP_wfxEyNawiqZRb3Bmflyt5Iq5wUoMfWgyHwrAe1jcpvJP6xRq3FOeH5y9yXuiDaAILALa0hrgJH5Jom4wukj6msz20F96Dg7qBFoxO6tB62SRCnvBHe3R-cKTlyLxFBd23iU9czobEAnbgNXRy0PmqWNohXWaqjtLZKiYY-Z2ncleraDSG5uHJsC5hJBmeIoVaV4fh5Ks5zVEnumLmUKKQQt8EssDxXOPk4r3r1x8Q7tvpswBaDyvafevRSltSCa9w7eg6zxBcb8sAGWgfH4PDvw7gfusqowCRnjf7OD45iOegk2iYSrSeDGDZMpgtIAzYVpQDXb_xTmg95eTKOrfS9Ovk69O7YU-wuH4cfdbuDPTQEIxlariyyq_T8caf1Qpd_XKuOaasKTcAPEVUPiAzMtkrts1QnIdTy1DYZqJpRKJ8xtAr5GG60IwQh2U_-u7EryEGYxU_CUkZkmTauw2WhZka4M0TiB3abGUJGnhDDOZQW2p0cltVROqZmUz5qGG_LVGleHU3-DgA46TtK8lph_F9PdKre5xqXe6c5IYVTk4e7yXd6irMNx4D4g1LxuD8HL4sYQkegF2xHbbN8sFy4VSLErkb9770-0af9LT29kzkva5fERMV90w`
- If this token not work and returned null response you can get it from the main website
- Test cards: https://myfatoorah.readme.io/docs/test-cards

> Unfortunately, not all gateways provide a Test Cards to be used during the development phase, we will keep this list updated as soon as we got any new piece of information

**<h3>Available payment methods.</h3>**
- https://myfatoorah.readme.io/docs/payment-methods

**<h3>Supported currencies.</h3>**
- https://myfatoorah.readme.io/docs/api-lookups

**<h3>Live API.</h3>**
- For the live API, you will need to use the following URL https://api.myfatoorah.com and the API key from your portal admin access, check it here  <a href="https://myfatoorah.readme.io/docs/create-live-account">Create Live Account</a>.<br>

**Notices:** 
- For replace demo information with your live api key and live api url you can change it from `config/configClass.php`.
- put you live api key without `bearer` which is locate at the first of the key obtained because our app add it automatically.
- For add additional currencies you can uncomment any currency as you want, but it must be supported by MyFatoorah Payment Gateway.
- Ui of our app for only make our app is obvious to you and make our  code is easy for use.
- some data we put it by default, you can set it with your data if you want.

Enjoy!

<hr>

**For more details visit <a href="https://myfatoorah.readme.io/docs/overview">the own company site</a>.**
