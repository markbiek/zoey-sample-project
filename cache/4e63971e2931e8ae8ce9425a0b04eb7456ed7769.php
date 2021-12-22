<html>
    <head>
        <title>Mark Biek | Zoey Code Test</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style type="text/tailwindcss">
            @layer  base {
                a {
                    @apply  underline;
                }

                a:hover {
                    @apply  no-underline;
                }

                h2 {
                    @apply  text-2xl;
                }

                h3 {
                    @apply  text-xl mt-2 mb-1;
                }
            }

            main {
                width: 75%;
                margin: 0 auto;
            }

            ul {
                list-style-type: disc;
                padding-top: 0.5rem;
                padding-left: 3rem;
            }

            .container {
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <main>
            <nav>
                <h1 class="text-4xl mb-2"><a href="/">Home</a></h1>
            </nav>

            <section>
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </main>
    </body>
</html><?php /**PATH /Users/mark/dev/zoey-code-test/zoey-sample-project/resources/views/layouts/app.blade.php ENDPATH**/ ?>