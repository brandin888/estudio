            <!-- FAQs Start -->
            <div class="faqs">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Preguntas Frecuentes</p>
                        <h2>¿Tienes alguna duda?</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="accordion-1">
                            @foreach($questions as $key => $question)
                              @if ($key < 5) 
                                <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                            {{ $question->question }}
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                            {{ $question->response }}
                                        </div>
                                    </div>
                                </div>

                              @endif

                            @endforeach
                            

                        <div class="col-md-6">
                            <div id="accordion-2">
                            @foreach($questions as $key => $question)
                              @if ($key >= 5) 
                                <div class="card wow fadeInLeft" data-wow-delay="0.1s">
                                    <div class="card-header">
                                        <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne">
                                            {{ $question->question }}
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion-1">
                                        <div class="card-body">
                                            {{ $question->response }}
                                        </div>
                                    </div>
                                </div>

                              @endif

                            @endforeach
                                
                                
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQs End -->