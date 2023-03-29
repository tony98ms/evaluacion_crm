<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript","php"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                                  <a href="#" data-language-name="php">php</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>Asesores</h1>
<p>Api para Obtener asesores</p>
<!-- START_00dbeb8940289d032b92cdc45e9b945e -->
<h2>Obtiene los asesores comerciales disponibles de un medio requerido</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://blubear.test/api/asesores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"medio":"11"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://blubear.test/api/asesores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "medio": "11"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://blubear.test/api/asesores',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'medio' =&gt; '11',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "data": [
        {
            "nombres": "FRANCISCO XAVIER",
            "apellidos": "VILLAMAR CASTRO",
            "celular": "0987647944",
            "user_name": "MA_PALACIOS",
            "email": "fvillamar@1001carros.com",
            "agencia": "CUMBAYA",
            "lineas_negocio": [
                "SEMINUEVOS"
            ]
        },
        {
            "nombres": "Admin",
            "apellidos": "SugarCRM",
            "celular": null,
            "user_name": "admin",
            "email": "mwherrera@plus-projects.com",
            "agencia": "MATRIZ",
            "lineas_negocio": []
        }
    ]
}</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated.",
    "status_code": 500
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/asesores</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>medio</code></td>
<td>numeric</td>
<td>required</td>
<td>Medio requerido</td>
</tr>
</tbody>
</table>
<!-- END_00dbeb8940289d032b92cdc45e9b945e -->
<h1>Autenticación</h1>
<p>APIs para gestión de tokens</p>
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
<h2>Crear usuario</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://blubear.test/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"name":"Maria","email":"mart@hotmail.com","password":"Hol@MunD0","fuente":"inconcert","fuente_id":"2","medios":"2,3,5","compania":"1"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://blubear.test/api/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "name": "Maria",
    "email": "mart@hotmail.com",
    "password": "Hol@MunD0",
    "fuente": "inconcert",
    "fuente_id": "2",
    "medios": "2,3,5",
    "compania": "1"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://blubear.test/api/register',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'name' =&gt; 'Maria',
            'email' =&gt; 'mart@hotmail.com',
            'password' =&gt; 'Hol@MunD0',
            'fuente' =&gt; 'inconcert',
            'fuente_id' =&gt; '2',
            'medios' =&gt; '2,3,5',
            'compania' =&gt; '1',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status_code": "200",
    "message": "Usuario Creado Correctamente"
}</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Usuario Creado Correctamente"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/register</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>required</td>
<td>el nombre del usuario.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>email</td>
<td>required</td>
<td>email El email del usuario.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>optional</td>
</tr>
<tr>
<td><code>fuente</code></td>
<td>tipo</td>
<td>optional</td>
<td>de fuente.</td>
</tr>
<tr>
<td><code>fuente_id</code></td>
<td>Id</td>
<td>optional</td>
<td>de la fuente.</td>
</tr>
<tr>
<td><code>medios</code></td>
<td>Medios</td>
<td>optional</td>
<td>de acceso.</td>
</tr>
<tr>
<td><code>compania</code></td>
<td>Id</td>
<td>optional</td>
<td>de la compania.</td>
</tr>
</tbody>
</table>
<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->
<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
<h2>Crear un token de usuario</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://blubear.test/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"autorizador":"mart_admin@hotmail.com","email":"mart@hotmail.com","password":"Hol@MunD0","environment":"dev"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://blubear.test/api/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "autorizador": "mart_admin@hotmail.com",
    "email": "mart@hotmail.com",
    "password": "Hol@MunD0",
    "environment": "dev"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://blubear.test/api/login',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'autorizador' =&gt; 'mart_admin@hotmail.com',
            'email' =&gt; 'mart@hotmail.com',
            'password' =&gt; 'Hol@MunD0',
            'environment' =&gt; 'dev',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status_code": "200",
    "token": "slghn1EDIJjMvYNkAFQvnHGfPDl5srH8X11TKyl"
}</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Password incorrecto"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/login</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>autorizador</code></td>
<td>email</td>
<td>required</td>
<td>El email del usuario autorizador.</td>
</tr>
<tr>
<td><code>email</code></td>
<td>email</td>
<td>required</td>
<td>El email del usuario.</td>
</tr>
<tr>
<td><code>password</code></td>
<td>string</td>
<td>required</td>
<td>El password del usuario</td>
</tr>
<tr>
<td><code>environment</code></td>
<td>string</td>
<td>required</td>
<td>Valores válidos: dev, prod</td>
</tr>
</tbody>
</table>
<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->
<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
<h2>Expirar un token de usuario</h2>
<p>Debe enviar en las cabeceras el token de autorización
Ejemplo: Authorization Bearer 1|slghn1EDIJjMvYNkAFQvnHGfPDl5srH8XM11Kyly</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://blubear.test/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://blubear.test/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://blubear.test/api/logout',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "status_code": 200,
    "token": "Token has deleted succesfully"
}</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated.",
    "status_code": 500
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/logout</code></p>
<!-- END_00e7e21641f05de650dbe13f242c6f2c -->
<h1>Pares</h1>
<p>Api para obtener el numero de pares que coinciden con un valor en especifico.</p>
<!-- START_333fce3624adfb4d172e2adc2ace666f -->
<h2>Pares de Arreglo segun Diferencia</h2>
<p>Obtener el numero de pares de elemento de la matriz que tienen una diferencia igual al valor del objetivo.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://blubear.test/api/pares" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"valor_objetivo":"2","arreglo":"[1,2,3,4,5]"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://blubear.test/api/pares"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "valor_objetivo": "2",
    "arreglo": "[1,2,3,4,5]"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://blubear.test/api/pares',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
            'Authorization' =&gt; 'Bearer {token}',
        ],
        'json' =&gt; [
            'valor_objetivo' =&gt; '2',
            'arreglo' =&gt; '[1,2,3,4,5]',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Calculo realizado correctamente",
    "value": 3
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/pares</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>valor_objetivo</code></td>
<td>numeric</td>
<td>required</td>
<td>Valor Objetivo</td>
</tr>
<tr>
<td><code>arreglo</code></td>
<td>array</td>
<td>required</td>
<td>Arreglo de enteros</td>
</tr>
</tbody>
</table>
<!-- END_333fce3624adfb4d172e2adc2ace666f -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="php">php</a>
                              </div>
                </div>
    </div>
  </body>
</html>