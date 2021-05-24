<!DOCTYPE html>

    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width#device=width, initial=scale#1">
            <title>Cadastrar-se</title>
            
        <style>
            body {
                font-family: 'Nunito', sans-serif; 
                display:flex;
                flex:1;
                justify-content:center;
                align-items:center;
            }
            .container{
                display:flex;
                justify-content:center;
                align-items:center; 
                flex-direction:column;
            }

            a.link{
                color:gray;
            }
            a.link:hover{
                color:blue;
                cursor:pointer;
            }

            input{
                width:18rem;
                outline:none;
                border-top:none !important;
                border-right:none !important;
                border-left:none !important;
                border-bottom:1px solid green;
                transition: border-bottom 1s; 
            }
            label{
                margin-top:2rem !important;
            }

            button{
                border:none;
                margin:2rem 0;
                border-radius:5px;
                background-color:#28a745;
                color: white;
                width:18rem;
                height: 2.5rem;        
                transition:background-color 0.6s; 
            }
            button:hover{
                background-color:green;
                cursor:pointer;
            }

            input:focus{
                border-bottom:1px solid blue;
            }

        

        </style>    


        </head>
        <body style="padding:0 2rem;">
            <form action="{{ route('save_user')}}" method="post">
            @csrf
                <div class="container">
                    <label>Nome completo</label>
                    <input type="text" name="name" id="name" />
                    <label>Apelido</label>
                    <input type="text" name="surname" id="surname" />
                    <label>E-mail</label>
                    <input type="text" name="email" id="email" />
                    <label>Senha</label>
                    <input type="password" name="password" id="password" />
                    <label>Confirme a senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" />
                    <button type="submit">Criar</button>
                </div>    
            </form>
        </body>
    </html>