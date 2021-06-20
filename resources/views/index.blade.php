@extends('layouts.main')

@section('content')
<div class="col-md-8 padding-20">
    <div class="row">
        <div class="col-md-12">
            <div class="fb-heading">
                Article Categories
            </div>
            <hr class="style-three">
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-6 margin-bottom-20">
                        <div class="fat-heading-abb">
                            <a href="{{ route('categories.show', [$category->slug, $category->id]) }}">
                                <i class="fa fa-folder"></i> {{ $category->name }}
                                <span class="cat-count">({{ $category->articles_count }})</span>
                            </a>
                        </div>
                        <div class="fat-content-small padding-left-30">
                            <ul>
                                @foreach($category->articles as $article)
                                    @if($loop->index >= 5)
                                        @break
                                    @endif
                                    <li>
                                        <a href="{{ route('articles.show', [$article->slug, $article->id]) }}">
                                            <i class="fa fa-file-text-o"></i> {{ $article->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        {{ $categories->links('partials.pagination') }}
    </div>
</div>
@endsection

@section('about')
<div class="container-fluid featured-area-grey padding-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fb-heading">
                    About Us
                </div>
                <div class="fb-content">
                    <p>
                       Esco Lifesciences Group is a world leader in laboratory, 
                       medical, pharmaceutical, and bioprocessing equipment. 
                       Our products are sold in more than 100 countries. 
                       We strive to create and commercialize enabling technologies 
                       that will help make human lives healthier and safer globally.
                    </p>
                    <p>
                       In 1978, Esco was founded in Singapore and began to pioneer cleanroom
                       technology in Southeast Asia. Esco was established to provide clean air 
                       solutions for the high-tech industrial and life sciences industries. 
                       Through the years, Esco has earned a reputation for innovation and excellence worldwide.
                    </p>
                     <p>
                       Today, Esco is developing new life sciences tools and is driving novel 
                       technologies through venture creation and incubation. We also continue 
                       to innovate in medical and bio-technology. With our life sciences equipment 
                       production capabilities, we are building a global life sciences ecosystem.
                       </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection