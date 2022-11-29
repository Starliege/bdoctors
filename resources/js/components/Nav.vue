<template>

    <div class="mynavbar">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="logo">
                    <img src="../../../public/img/Logo.png" alt="logo">
                </div>
                <ul class="navbar-nav ml-auto list_links">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            Homepage
                        </a>

                    </li>


                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">




                    <ul class="navbar-nav ml-auto list_links">


                        <li class="nav-item">
                            <a class="nav-link" href="/login">Accedi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/register">Registrati</a>
                        </li>

                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right menu-list" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/">
                                    Profilo
                                </a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </div>





</template>

<script>
export default {
    name: "Nav"
};
</script>

<style lang="scss" scoped>
// header {
//     display: flex;
//     align-items: center;
//     color: white;
//     height: 60px;
//     line-height: 60px;
//     background-image: linear-gradient(to right, #3575fc, #39c3fc);

//     nav {
//         display: flex;
//         justify-content: space-between;
//         align-items: center;
//         height: inherit;

//         img {
//             width: 50px;
//         }

//         .home {
//             font-size: 2rem;
//         }

//         a {
//             color: #fff;
//             text-decoration: none;
//         }

//         .btn-custom {
//             border: none;
//             background: none;

//             &:focus {
//                 border: 1px solid #fff;
//             }
//         }

//         i {
//             font-size: 20px;
//         }

//         img {
//             width: 50px;
//             padding: 0 5px;
//             border-right: 1px solid rgb(255, 255, 255);
//         }

//         .home {
//             font-size: 2rem;
//         }

//         a {
//             color: #fff;
//             text-decoration: none;
//         }

//         .btn-custom {
//             border: none;
//             background: none;

//             &:focus {
//                 border: 1px solid #fff;
//             }
//         }

//         i {
//             font-size: 20px;
//         }

//         .right {
//             display: flex;
//             align-items: center;

//             .list {
//                 margin-bottom: 0;
//                 font-size: 22px;

//                 a {
//                     color: white;

//                     &:hover {
//                         color: #ff6600;
//                     }
//                 }

//                 li::after {
//                     display: block;
//                     position: absolute;
//                     content: "";
//                     top: 50px;
//                     left: 0;
//                     height: 1px;
//                     width: 0%;
//                     background-color: white;
//                     // -webkit-transition: width 0.3s;
//                 }

//                 li {
//                     font-size: 15px;
//                     position: relative;
//                     height: 100%;
//                     padding: 25px;

//                     &:hover {
//                         &::after {
//                             width: 100%;
//                             transition: ease-in-out 0.3s;
//                         }
//                     }

//                 }
//             }
//         }
//     }

//     .link-hamburger {
//         display: block;
//     }

//     .hamburger {
//         display: none;
//     }

//     .dropdown-menu {
//         background-image: linear-gradient(to right, #1e6650, #63987a);
//         transform: translate(0px, 54px);
//         border: 2px solid black;

//         li {
//             text-align: center;
//             cursor: pointer;

//             &:first-child {
//                 border-bottom: 1px solid black;
//             }
//         }
//     }

//     .dropdown-item-custom:hover {
//         background-color: none;
//     }

//     @media all and (max-width: 776px) {
//         .hamburger {
//             display: block;
//         }

//         .links {
//             display: none;
//         }
//     }
// }
</style>