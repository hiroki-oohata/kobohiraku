// //プログレス表示
// $(function(){
//   'use strict';
//   //プログレス表示の関数を呼び出す
//   imagesprogress();
//
//   //画像の読み込み状況をプログレス表示
//   function imagesprogress () {
//
//     var $container    = $('#progress'),                    //1
//         $progressBar  = $container.find('.progress-bar'),  //2
//         $progressText = $container.find('.progress-text'), //3
//         //1.プログレス表示全体のコンテナ
//         //2.プログレス表示のバー部分
//         //3.プログレス表示のテキストの部分
//
//         //imagesLoadedライブラリbody要素内の画像の読み込み状況を監視
//         //同時にbody全体の画像の総数を保存
//         imgLoad  = imagesLoaded('body,')
//         imgTotal = imgLoad.images.length,
//
//         //読み込みの完了した画像の数のカウンターと、
//         //プログレス表示の現在地にあたる数値（ともに最初は0）
//         imgLoaded = 0,
//         current   = 0,
//
//         //1秒間に60回のペースで読み込み状況をチェック
//         progressTimer = setInterbal(updateProgress, 1000 / 60);
//
//         //imagesLoadedを利用し。画像が読み込まれるごとにカウンターを加算
//         imgLoad.on('progress', function() {
//           imgLoaded++;
//         });
//
//         //画像の読み込み状況をもとにプログレス表示を更新
//         //この関はsetInterval()メソッドにより1秒間に60回呼び出される
//         function updateProgress() {
//
//           //読み込みの完了した画像のパーセンテージ
//           var target = (imgLoaded / imgTotal) * 100;
//
//           //current(現在地)とtarget(目的地)の距離をもとにイージングをかける
//           current += (target - current) * 0.1;
//
//           //表示のバーの幅とテキストにcurrentの値を反映
//           //テキストは少数点以下を切り捨てて整数に
//           $progressBar.css({width: current + '%'});
//           $progressText.text(Math.floor(current) + '%');
//
//           //終了処理
//           if(current >= 100) {
//             clearUnterval(progressTimer);
//             $container.addClass('progress-complete');
//             $progressBar.add($progressText)
//                .delay(500)
//                .animate({opacity: 0}, 250, function() {
//                  $container.animate({
//                     top: '-100%'
//                  }, 100, 'easeInoutquint');
//                });
//           }
//
//           //currentが99.9より大きければ100と見なして終了処理へ
//           if (current > 99.9) {
//               current = 100;
//           }
//         }
//       }
//     }
// });

// $.scrollify({section:".about, .works, .order, .contact"});
