
<div class="container-fluid footer marg30">
    <div class="container">
        <div class="col-xs-12 col-sm-4 col-md-4 margin-top-20">
            <div class="panel-transparent">
                <div class="footer-heading">What is Knowledge Management</div>
                <div class="footer-body">
                    <p>Knowledge Management or commonly referred to as KM is a process that helps in the organization of important knowledge and experience that exists within the organization, usually in a structured format.</p>
                    <p> The main purpose of knowledge management is that important knowledge and experience can be shared within the organization. KMS (Knowledge Management System) is a system created to facilitate the creation, storage, retrieval, transfer and reuse of knowledge.</p>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 margin-top-20">
            <div class="panel-transparent">
                <div class="footer-heading">Categories</div>
                <div class="footer-body">
                    <ul>
                        @foreach($footerCategories as $category)
                            <li>
                                <a href="{{ route('categories.show', [$category->slug, $category->id]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-4 margin-top-20">
            <div class="panel-transparent">
                <div class="footer-heading">Popular Articles</div>
                <div class="footer-body">
                    <ul>
                        @foreach($popularArticles as $article)
                            <li>
                                <a href="{{ route('articles.show', [$article->slug, $article->id]) }}">{{ $article->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- COPYRIGHT INFO -->
<div class="container-fluid footer-copyright marg30">
    <div class="container">
        <div class="pull-left">
            Sekolah Tinggi Teknologi Indonesia Tanjung Pinang</a>
        </div>
    </div>
</div>
<!-- END COPYRIGHT INFO -->