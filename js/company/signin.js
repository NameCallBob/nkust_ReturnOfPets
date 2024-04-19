import Page from "../PageContent/Page.js";
import request from "../request.js";
window.onload = function () {
    let page = new Page()
    document.getElementById('root').innerHTML = page.com_login()
    document.getElementById('signin').onclick = () => {
        let account = document.getElementById('account');
        let password = document.getElementById('password'); 
        //傳入後端
        let data = {
            account:account.value,
            password:password.value,
            role:'company'
        }
        request().post('index.php?action=dologin',Qs.stringify(data))
        .then((res)=>{
            let response = res['data'];
            if (response['status'] == 200 ){
                window.localStorage.setItem('jwtToken',response['token'])
                window.localStorage.setItem('reac',document.getElementById('account').value)
                alert('登入成功')
                location.href = "comcenter.html"
            }
            else{
                alert('登入失敗')
                location.reload()
            }
        })
        .catch((err)=>{
            console.log(err)
        })

    }




}