<div class="container-fluid page-body-wrapper">
    <div class="container" style="justify-content:center; align-item:center; padding-top:100 px;">
        <form action="{{ url('upload_lab') }}" method='post'>
            @csrf
            <div style="padding:15px ">
                <label> Name Of Lab</label>
                <input type="text" style="color:black; " name="name " placeholder="write the name of the lab">
            </div>


            <div style="padding:15px">
                <label>Select Tests</label>
                <select style="color:black; width:200px;">
                    <option>--select--</option>
                    <option value="arthritis">arthritis</option>
                    <option value="blood pressure">blood pressure</option>
                    <option value="corona">corona</option>
                    <option value="diabetes">diabetes</option>
                    <option value="drug toxicology">drug toxicology</option>
                    <option value="hepatitis a">hepatitis a</option>
                    <option value="hepatitis b">hepatitis b</option>
                    <option value="hcv">hcv</option>
                    <option value="h pylori">h pylori</option>
                    <option value="urinalysis">urinalysis</option>


                </select>
            </div>

            <div style="padding:15px">
                <label>Select Location</label>
                <select style="color:black; width:200px;">
                    <option>--select--</option>
                    <option value="cbd">cbd</option>
                    <option value="donholm">donholm</option>
                    <option value="kahawa">kahawa</option>
                    <option value="pangani">pangani</option>
                    <option value="ruai">ruai</option>
                    <option value="south b">south b</option>
                    <option value="upperhill">upperhill</option>
                    <option value="westlands">westlands</option>
                </select>
                <div class="d-flex justify-content-center">
                    <input type="submit" value="submit" class="btn btn-success btn-block ">
                </div>
            </div>
        </form>
    </div>
</div>
