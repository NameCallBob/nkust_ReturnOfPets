import Page from "./PageContent/Page.js"
import request from "./request.js"

window.onload = function(){
    const page = new Page();
    document.getElementById('root').innerHTML = page.memberCenter()
    let params = {
        way:'account',
        params:window.localStorage.getItem('reac'),
        role:'member'
    }
    request().post("index.php?action=getMember",Qs.stringify(params))
    .then((res)=>{
        let response = res['data'];
        if (response['status']==200){

            //將後端資料自動寫入前端input
            let mdata = document.getElementsByName('mData')
            response['result'].forEach(element => {
                mdata[0].value = element['name'];
                mdata[1].value = element['email'];
                mdata[2].value = element['phone'];
                mdata[3].value = element['address'];
                mdata[4].value = element['birth'];
                mdata[5].value = element['password'];
            });

            //事件驅動
            document.getElementById('member_store').onclick = function () {
                let mdata = document.getElementsByName('mData')
                let params = {
                    role:'member',
                    account:window.localStorage.getItem('reac'),
                    name:mdata[0].value,
                    email:mdata[1].value,
                    phone:mdata[2].value,
                    address:mdata[3].value,
                    birth:mdata[4].value,
                    password:mdata[5].value
                }
                
                request().post("index.php?action=updateMember",Qs.stringify(params))
                .then((res)=>{
                    let response = res['data']
                    if (response['status'] == 200){
                        alert('修改成功');
                        location.reload()
                    }
                    else if (response['status'] == 403){
                        alert('時效已過，請重新登入!')
                        location.href = 'login.html'
                    }
                    else{
                        alert('PROGRAM ERROR');
                                           
                    }

                })
                .catch((err)=>{
                    console.log(err);
                })
            }
        }
    })

    .catch((err)=>{
        console.log(err);
    })

}