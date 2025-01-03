<?php
$userContact = Yii::$app->user->identity->userContact ?? null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | User Profile</title> <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css?v=3.2.0">
    <script data-cfasync="false" nonce="ce7cb347-052b-4abb-9197-a1d68f476538">
        try {
            (function (w, d) {
                !function (a, b, c, d) {
                    if (a.zaraz) console.error("zaraz is loaded twice"); else {
                        a[c] = a[c] || {};
                        a[c].executed = [];
                        a.zaraz = {deferred: [], listeners: []};
                        a.zaraz._v = "5848";
                        a.zaraz._n = "ce7cb347-052b-4abb-9197-a1d68f476538";
                        a.zaraz.q = [];
                        a.zaraz._f = function (e) {
                            return async function () {
                                var f = Array.prototype.slice.call(arguments);
                                a.zaraz.q.push({m: e, a: f})
                            }
                        };
                        for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
                        a.zaraz.init = () => {
                            var h = b.getElementsByTagName(d)[0], i = b.createElement(d),
                                j = b.getElementsByTagName("title")[0];
                            j && (a[c].t = b.getElementsByTagName("title")[0].text);
                            a[c].x = Math.random();
                            a[c].w = a.screen.width;
                            a[c].h = a.screen.height;
                            a[c].j = a.innerHeight;
                            a[c].e = a.innerWidth;
                            a[c].l = a.location.href;
                            a[c].r = b.referrer;
                            a[c].k = a.screen.colorDepth;
                            a[c].n = b.characterSet;
                            a[c].o = (new Date).getTimezoneOffset();
                            if (a.dataLayer) for (const k of Object.entries(Object.entries(dataLayer).reduce(((l, m) => ({...l[1], ...m[1]})), {}))) zaraz.set(k[0], k[1], {scope: "page"});
                            a[c].q = [];
                            for (; a.zaraz.q.length;) {
                                const n = a.zaraz.q.shift();
                                a[c].q.push(n)
                            }
                            i.defer = !0;
                            for (const o of [localStorage, sessionStorage]) Object.keys(o || {}).filter((q => q.startsWith("_zaraz_"))).forEach((p => {
                                try {
                                    a[c]["z_" + p.slice(7)] = JSON.parse(o.getItem(p))
                                } catch {
                                    a[c]["z_" + p.slice(7)] = o.getItem(p)
                                }
                            }));
                            i.referrerPolicy = "origin";
                            i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                            h.parentNode.insertBefore(i, h)
                        };
                        ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async bs => new Promise((bt => {
                    if (bs) {
                        bs.e && bs.e.forEach((bu => {
                            try {
                                const bv = d.querySelector("script[nonce]"),
                                    bw = bv?.nonce || bv?.getAttribute("nonce"), bx = d.createElement("script");
                                bw && (bx.nonce = bw);
                                bx.innerHTML = bu;
                                bx.onload = () => {
                                    d.head.removeChild(bx)
                                };
                                d.head.appendChild(bx)
                            } catch (by) {
                                console.error(`Error executing script: ${bu}\n`, by)
                            }
                        }));
                        Promise.allSettled((bs.f || []).map((bz => fetch(bz[0], bz[1]))))
                    }
                    bt()
                }));
                zaraz._p({"e": ["(function(w,d){})(window,document)"]});
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        }

    </script>
</head>

<body>
<div class="container wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section> <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center"><img class="profile-user-img img-fluid img-circle"
                                                          src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                                          alt="User profile picture"></div>
                            <h3 class="profile-username text-center"><?= $userContact->firstname ?? ''; ?> <?= $userContact->lastname ?? ''; ?></h3>
                            <p class="text-muted text-center"><?= $userContact->user->username ?? ''; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item"><b>Followers</b> <a class="float-right">1,322</a></li>
                                <li class="list-group-item"><b>Following</b> <a class="float-right">543</a></li>
                                <li class="list-group-item"><b>Friends</b> <a class="float-right">13,287</a></li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div> <!-- /.card-header -->
                        <div class="card-body"><strong><i class="fas fa-phone mr-1"></i> Phone</strong>
                            <p class="text-muted"> <?= $userContact->phone ?? ''; ?> </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?= $userContact->address ?? ''; ?></p>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link " href="#activity"
                                                        data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
                                </li>
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class=" tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block"><img class="img-circle img-bordered-sm"
                                                                     src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                                                     alt="user image"> <span class="username"> <a
                                                        href="#">Jonathan Burke Jr.</a> <a href="#"
                                                                                           class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a> </span> <span
                                                    class="description">Shared publicly - 7:30 PM today</span></div>
                                        <!-- /.user-block -->
                                        <p> Lorem ipsum represents a long-held tradition for designers, typographers and
                                            the like. Some people hate it and argue for its demise, but others ignore
                                            the hate as they create awesome tools to help create filler text for
                                            everyone from bacon lovers to Charlie Sheen fans. </p>
                                        <p><a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                                Share</a> <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a> <span
                                                    class="float-right"> <a href="#" class="link-black text-sm"> <i
                                                            class="far fa-comments mr-1"></i> Comments (5) </a> </span>
                                        </p> <input class="form-control form-control-sm" type="text"
                                                    placeholder="Type a comment">
                                    </div> <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block"><img class="img-circle img-bordered-sm"
                                                                     src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                                                     alt="User Image"> <span class="username"> <a
                                                        href="#">Sarah Ross</a> <a href="#"
                                                                                   class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a> </span> <span
                                                    class="description">Sent you a message - 3 days ago</span></div>
                                        <!-- /.user-block -->
                                        <p> Lorem ipsum represents a long-held tradition for designers, typographers and
                                            the like. Some people hate it and argue for its demise, but others ignore
                                            the hate as they create awesome tools to help create filler text for
                                            everyone from bacon lovers to Charlie Sheen fans. </p>
                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0"><input
                                                        class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block"><img class="img-circle img-bordered-sm"
                                                                     src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg"
                                                                     alt="User Image"> <span class="username"> <a
                                                        href="#">Adam Jones</a> <a href="#"
                                                                                   class="float-right btn-tool"><i
                                                            class="fas fa-times"></i></a> </span> <span
                                                    class="description">Posted 5 photos - 5 days ago</span></div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6"><img class="img-fluid" src="../../dist/img/photo1.png"
                                                                       alt="Photo"></div> <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6"><img class="img-fluid mb-3"
                                                                               src="../../dist/img/photo2.png"
                                                                               alt="Photo"> <img class="img-fluid"
                                                                                                 src="../../dist/img/photo3.jpg"
                                                                                                 alt="Photo"></div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6"><img class="img-fluid mb-3"
                                                                               src="../../dist/img/photo4.jpg"
                                                                               alt="Photo"> <img class="img-fluid"
                                                                                                 src="../../dist/img/photo1.png"
                                                                                                 alt="Photo"></div>
                                                    <!-- /.col -->
                                                </div> <!-- /.row -->
                                            </div> <!-- /.col -->
                                        </div> <!-- /.row -->
                                        <p><a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>
                                                Share</a> <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a> <span
                                                    class="float-right"> <a href="#" class="link-black text-sm"> <i
                                                            class="far fa-comments mr-1"></i> Comments (5) </a> </span>
                                        </p> <input class="form-control form-control-sm" type="text"
                                                    placeholder="Type a comment">
                                    </div> <!-- /.post -->
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label"><span class="bg-danger"> 10 Feb. 2014 </span></div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div><i class="fas fa-envelope bg-primary"></i>
                                            <div class="timeline-item"><span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                    email</h3>
                                                <div class="timeline-body"> Etsy doostang zoodles disqus groupon greplin
                                                    oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                                                    jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely
                                                    odeo kaboodle quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer"><a href="#" class="btn btn-primary btn-sm">Read
                                                        more</a> <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div> <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div><i class="fas fa-user bg-info"></i>
                                            <div class="timeline-item"><span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                    accepted your friend request </h3>
                                            </div>
                                        </div> <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div><i class="fas fa-comments bg-warning"></i>
                                            <div class="timeline-item"><span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                    post</h3>
                                                <div class="timeline-body"> Take me to your leader! Switzerland is small
                                                    and neutral! We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer"><a href="#"
                                                                                class="btn btn-warning btn-flat btn-sm">View
                                                        comment</a></div>
                                            </div>
                                        </div> <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label"><span class="bg-success"> 3 Jan. 2014 </span></div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div><i class="fas fa-camera bg-purple"></i>
                                            <div class="timeline-item"><span class="time"><i class="far fa-clock"></i> 2 days ago</span>
                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                                </h3>
                                                <div class="timeline-body"><img src="https://placehold.it/150x100"
                                                                                alt="..."> <img
                                                            src="https://placehold.it/150x100" alt="..."> <img
                                                            src="https://placehold.it/150x100" alt="..."> <img
                                                            src="https://placehold.it/150x100" alt="..."></div>
                                            </div>
                                        </div> <!-- END timeline item -->
                                        <div><i class="far fa-clock bg-gray"></i></div>
                                    </div>
                                </div> <!-- /.tab-pane -->
                                <div class="tab-pane active" id="settings">

                                    <form class="form-horizontal">
                                        <div class="form-group row"><label for="inputUsername"
                                                                           class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputUsername"
                                                       placeholder="username"
                                                       value="<?= $userContact->user->username ?? ''; ?>"
                                                       disabled
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group row"><label for="inputEmail"
                                                                           class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10"><input type="email" class="form-control"
                                                                          id="inputEmail" placeholder="Name"
                                                                          value="<?= $userContact->user->email ?? ''; ?>"
                                                                          disabled></div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Parol</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputPassword" disabled placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group row"><label for="inputFirstName"
                                                                           class="col-sm-2 col-form-label">Ism</label>
                                            <div class="col-sm-10"><input type="email" class="form-control"
                                                                          id="inputFirstName" placeholder="Email"  value="<?= $userContact->firstname ?? ''; ?>"
                                                                          disabled></div>
                                        </div>
                                        <div class="form-group row"><label for="inputLastName"
                                                                           class="col-sm-2 col-form-label">Familiya</label>
                                            <div class="col-sm-10"><input type="text" class="form-control"
                                                                          id="inputLastName" placeholder="Name"  value="<?= $userContact->lastname ?? ''; ?>"
                                                                          disabled></div>
                                        </div>
                                        <div class="form-group row"><label for="inputPhone"
                                                                           class="col-sm-2 col-form-label">Tel</label>
                                            <div class="col-sm-10"><input class="form-control" id="inputExperience"
                                                                          placeholder="inputPhone"  value="<?= $userContact->phone ?? ''; ?>"
                                                                          disabled></div>
                                        </div>
                                        <div class="form-group row"><label for="inputAddress"
                                                                           class="col-sm-2 col-form-label">Manzil</label>
                                            <div class="col-sm-10"><input type="text" class="form-control"
                                                                          id="inputAddress" placeholder="Skills"  value="<?= $userContact->address ?? ''; ?>"
                                                                          disabled></div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger user-profile-update-btn">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    use yii\helpers\Html;
                                    use yii\widgets\ActiveForm;
?>
                                    <?php $form = ActiveForm::begin([
                                        'id' => 'user-profile-update-form',
                                        'options' => ['class' => 'form-horizontal'],
                                    ]); ?>

                                    <div class="form-group row">
                                        <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <?= $form->field($user, 'username')->textInput(['disabled' => true])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <?= $form->field($user, 'email')->textInput(['disabled' => true,'id'=>'user-profile-email'])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputFirstName" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10">
                                            <?= $form->field($contact, 'firstname')->textInput(['disabled' => true,'id'=>'user-profile-firstname'])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputLastName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <?= $form->field($contact, 'lastname')->textInput(['disabled' => true,'id'=>'user-profile-lastname'])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <?= $form->field($contact, 'phone')->textInput(['disabled' => true,'id'=>'user-profile-phone'])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <?= $form->field($contact, 'address')->textInput(['disabled' => true,'id'=>'user-profile-address'])->label(false) ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <?= Html::button('Edit', ['class' => 'btn btn-warning user-profile-update-btn']) ?>
                                            <?= Html::submitButton('Save', ['class' => 'btn btn-primary user-profile-save-btn d-none']) ?>
                                        </div>
                                    </div>

                                    <?php ActiveForm::end(); ?>


                                </div> <!-- /.tab-pane -->
                            </div> <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section> <!-- /.content -->
    <!--    </div>-->
    <!-- /.content-wrapper -->
    <!-- /.control-sidebar -->
</div> <!-- ./wrapper -->