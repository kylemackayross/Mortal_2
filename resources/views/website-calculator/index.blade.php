{{-- <x-app-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MO - Website Calculator</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/calculator/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                  <svg style="height: 50px; padding-right: 1rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 149 110">
                    <defs>
                        <filter id="a">
                            <feColorMatrix in="SourceGraphic"
                                values="0 0 0 0 0.086275 0 0 0 0 0.105882 0 0 0 0 0.188235 0 0 0 1.000000 0"></feColorMatrix>
                        </filter>
                    </defs>
                    <g fill="#161b30" fill-rule="evenodd" transform="translate(-48 -65)">
                        <path
                            d="M170.544 107.346a22.029 22.029 0 0 1-3.03 8.57 27.357 27.357 0 0 1-6.039 6.96 29.92 29.92 0 0 1-5.391 3.542 30.908 30.908 0 0 1-6.036 2.328 26.56 26.56 0 0 1-6.364.95c-3.218.081-6.164-.376-8.862-1.37-2.7-1-4.998-2.442-6.912-4.29-1.932-1.801-3.356-3.958-4.313-6.433-.934-2.48-1.285-5.186-1.002-8.121.3-2.95 1.211-5.729 2.694-8.363 1.482-2.63 3.398-5 5.758-7.08a30.043 30.043 0 0 1 8.082-5.13 28.167 28.167 0 0 1 9.499-2.293c2.224-.132 4.35.012 6.374.403 2.02.412 3.92 1.054 5.65 1.922 1.76.885 3.31 1.954 4.665 3.225a17.19 17.19 0 0 1 4.378 6.681c.95 2.58 1.225 5.41.849 8.5">
                        </path>
                        <path
                            d="M180.2 107.533a32.125 32.125 0 0 1-2.348 8.491 36.69 36.69 0 0 1-4.446 7.626 41.408 41.408 0 0 1-6.025 6.465 40.257 40.257 0 0 1-7.436 5.094c-2.627 1.422-5.392 2.506-8.297 3.3a37.57 37.57 0 0 1-8.878 1.309c-2.983.069-5.808-.218-8.466-.849-2.688-.638-5.145-1.56-7.39-2.821a32.35 32.35 0 0 1-1.932-1.19c.507 2.692 1.007 5.387 1.538 8.068-3.318.08-6.619.161-9.898.235-1.515-7.837-3.038-15.72-4.576-23.666-.804-4.124-1.618-8.27-2.415-12.43-2.116 4.798-4.226 9.582-6.28 14.302-2.053 4.695-4.105 9.348-6.115 13.96-1.727.491-3.478.977-5.183 1.457-7.064-6.054-14.097-12.112-21.12-18.142 1.785 8.562 3.58 17.043 5.354 25.484-3.12.072-6.208.152-9.285.218a7097.63 7097.63 0 0 1-4.31-20.057c-1.438-6.744-2.9-13.556-4.345-20.379a967.82 967.82 0 0 0 7.242-2.28c8.876 7.528 17.774 15.08 26.724 22.656 2.54-5.846 5.12-11.79 7.712-17.747a19337.8 19337.8 0 0 1 7.985-18.287c2.54-.8 5.086-1.6 7.65-2.412.579 3.014 1.144 6.016 1.72 9.013.16.873.322 1.734.49 2.596.508-.9 1.039-1.782 1.637-2.641a39.914 39.914 0 0 1 5.62-6.633 41.063 41.063 0 0 1 7.126-5.4 41.078 41.078 0 0 1 8.29-3.795 38.314 38.314 0 0 1 9.07-1.785c3.154-.185 6.16-.012 8.986.57 2.837.59 5.464 1.524 7.864 2.773 2.426 1.275 4.587 2.832 6.453 4.678a26.043 26.043 0 0 1 4.55 6.251 26.242 26.242 0 0 1 2.564 7.507c.494 2.684.54 5.497.17 8.46m-2.913-31.913c-13.603-7.877-33.218-11.873-54.332-10.27-21.117 1.615-39.533 8.2-52.976 17.41-13.085 8.956-21.315 20.522-21.94 32.451-.626 11.927 6.266 22.225 17.963 29.576 11.798 7.42 38.078 11.784 48.406 11.651 1.304-.018 2.307-.027 3.075-.04.008-.009.012-.023.023-.035-.1-.003-.116-.009.01-.009l-.01.009c.617.015 4.565-.025-.023.036-4.657 6.287-9.25 12.49-13.761 18.602 9.465-4.693 19.13-9.48 28.96-14.36 10.031-4.979 20.27-10.066 30.705-15.246h-.013c9.071-4.348 16.89-9.8 22.695-15.99 5.89-6.29 9.303-10.334 10.75-20.725 1.443-10.384-5.8-25.105-19.532-33.06">
                        </path>
                    </g>
                  </svg>
                </a>
            </div>
              <a class="navbar-brand" href="#">Website Calculator</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <div class="row justify-content-md-center mb-3">
                      <div class="col col-md-2">
                          <select class="form-select form-select-sm" aria-label="rates">
                            <option value="1115" selected>SA Rates</option>
                            <option value="1550">International Rates</option>
                            </select>
                      </div>
                  </div>
                  </li>
                </ul>
                <div class="d-flex">
                  <div class="row">
                    <div class="col-12">
                      Total Hours: &nbsp;<span class="totalhours" id="totalhours">0</span>
                    </div>
                    <div class="col-12">
                      Total: &nbsp;R<span class="totalsum" id="totalsum">0</span>
                    </div>
                    <div class="col-12">
                      Grand Total (with QA and PAM): &nbsp;R<span class="Grandtotal" id="Grandtotal">0</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </nav>
    </header>
    <section class="form">
        <div class="row">
            <!-- Design section -->
            <div class="col-md-6 gdesign">
                <div class="row">
                    <h1>Design</h1>
                    <h3 class="sectionhead pb-3">Global Elements</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-2">
                        <label>Header</label>
                        <input type="number" class="form-control Ghours" min="0" placeholder="Hours" aria-label="Ghours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>&nbsp;</label>
                        <input type="number" class="form-control Gtotal" min="0" placeholder="Total" aria-label="Gtotal" disabled>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Footer</label>
                      <input type="number" class="form-control Ghours" min="0" placeholder="Hours" aria-label="Ghours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>&nbsp;</label>
                      <input type="number" class="form-control Gtotal" min="0" placeholder="Total" aria-label="Gtotal" disabled>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Page Feature</label>
                        <input type="number" class="form-control Ghours" min="0" placeholder="Hours" aria-label="Ghours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>&nbsp;</label>
                        <input type="number" class="form-control Gtotal" min="0" placeholder="Total" aria-label="Gtotal" disabled>
                    </div>
                  </div>
            </div>
            <!-- Development section -->
            <div class="col-md-6 gdev">
                <div class="row">
                    <h1>Development</h1>
                    <h3 class="sectionhead pb-3">Global Elements</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-2">
                        <label>Header</label>
                        <input type="number" class="form-control Ghours" min="0" placeholder="Hours" aria-label="Header hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>&nbsp;</label>
                        <input type="number" class="form-control Gtotal" min="0" placeholder="Total" aria-label="Header total" disabled>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Footer</label>
                      <input type="number" class="form-control Ghours" min="0" placeholder="Hours" aria-label="Footer hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>&nbsp;</label>
                      <input type="number" class="form-control Gtotal" min="0" placeholder="Total" aria-label="Footer total" disabled>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Page Feature</label>
                        <input type="number" class="form-control Ghours" min="0" placeholder="Hours" aria-label="Page feature hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>&nbsp;</label>
                        <input type="number" class="form-control Gtotal" min="0" placeholder="Total" aria-label="Page feature total" disabled>
                    </div>
                  </div>
            </div>
        </div>

        <div class="row">
            <!-- Design section -->
            <div class="col-md-6 design">
                <div class="row">
                    <h3 class="sectionhead pb-3">Pages - Design</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <label>Page Name</label>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sections</label>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="number" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 pb-2">
                        <div>
                            <a href="javascript:void(0);" class="btn btn-success" title="Add field">ADD more Pages</a>
                        </div>
                    </div>
                </div>
                <div class="row field_wrapper">
                
                </div>
                <div class="row mt-2 extra">
                    <h3 class="sectionhead">Design blog articles and single page</h3>
                    <div class="col-6 col-sm-6">
                        <label>Number of Page</label>
                        <input type="text" class="form-control" placeholder="Description" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                      <input type="number" class="form-control DBhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                        <input type="text" class="form-control DBtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row mt-2 extra">
                    <h3 class="sectionhead">Webiniars designs</h3>
                    <div class="col-6 col-sm-6">
                        <label>Number of Page</label>
                        <input type="text" class="form-control" placeholder="Description" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                      <input type="number" class="form-control DBhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                        <input type="text" class="form-control DBtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
            </div>
            <!-- Development section -->
            <div class="col-md-6 dev">
                <div class="row">
                    <h3 class="sectionhead pb-3">Pages - Development</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <label>Page Name</label>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sections</label>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <input type="text" class="form-control" placeholder="Page name" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DBsec" placeholder="Sections" aria-label="sections">
                    </div>
                    <div class="col-6 col-sm-2">
                      <input type="number" class="form-control DPhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <input type="text" class="form-control DPtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-sm-6 pb-2">
                        <div>
                            <a href="javascript:void(0);" class="btn btn-success" title="Add field">ADD more Pages</a>
                        </div>
                    </div>
                </div>
                <div class="row field_wrapper">
                
                </div>
                <div class="row mt-2 extra">
                    <h3 class="sectionhead">Blog articles (Get custom quote from dev to import/migrate blogs)</h3>
                    <div class="col-6 col-sm-6">
                        <label>Number of Page</label>
                        <input type="text" class="form-control" placeholder="Description" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                      <input type="number" class="form-control DBhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                        <input type="text" class="form-control DBtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row mt-2 extra">
                    <h3 class="sectionhead">Webiniars (Get custom quote from dev to import/migrate webinars)</h3>
                    <div class="col-6 col-sm-6">
                        <label>Number of Page</label>
                        <input type="text" class="form-control" placeholder="Description" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                      <input type="number" class="form-control DBhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                        <input type="text" class="form-control DBtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row mt-2 extra">
                    <h3 class="sectionhead">Jobs (Get custom quote from dev to import/migrate jobs)</h3>
                    <div class="col-6 col-sm-6">
                        <label>Number of Page</label>
                        <input type="text" class="form-control" placeholder="Description" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                      <input type="number" class="form-control DBhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                        <input type="text" class="form-control DBtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
                <div class="row mt-2 extra">
                    <h3 class="sectionhead">Website redirects for SEO</h3>
                    <div class="col-6 col-sm-6">
                        <label>Number of redirects</label>
                        <input type="text" class="form-control" placeholder="Number of url" aria-label="pane-name">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Hours</label>
                      <input type="number" class="form-control DBhours" min="0" placeholder="Hours" aria-label="Page hours">
                    </div>
                    <div class="col-6 col-sm-2">
                        <label>Sub Total</label>
                        <input type="text" class="form-control DBtotal" min="0" placeholder="Total" aria-label="Page total" disabled>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="form operational">
      <div class="row">
        <h3 class="sectionhead pb-3">Operational Activities</h3>
        <div class="col-6 col-sm-3">
          <label>QA & Launch 10% of Grand Total</label>
      </div>
      <div class="col-6 col-sm-3">
        <input type="number" class="form-control  qa" placeholder="Total"  aria-label="Page total" disabled>
      </div>
      <div class="col-6 col-sm-3">
        <label>Project & Account Management 20% of Grand Total</label>										
      </div>
      <div class="col-6 col-sm-3">
          <input type="text" class="form-control pam" min="0" placeholder="Total" aria-label="Page total" disabled>
      </div>
      </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="/calculator/formscript.js"></script>

</body>
</html>

{{-- </x-app-layout> --}}
