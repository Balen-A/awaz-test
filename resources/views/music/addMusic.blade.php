@component('components.master')

<form action="/addMusic" method="POST">
    @csrf
    <input class="form-control" type="text" name="title" placeholder="title">
    <input class="form-control" type="text" name="artist_name" placeholder="artist name">
    <input class="form-control" type="text" name="album_name" placeholder="album name">
    <input class="form-control" type="text" name="genre_name" placeholder="genre name">
    <input class="form-control" type="text" name="path" id="path" placeholder="path">
    <input class="form-control" type="text" name="s3_key" id="key" placeholder="key">
    {{-- <input type="hidden" name="path" placeholder="path"> --}}

    <button type="submit">add song</button>

</form>

<form>
    @csrf
    <input type="file" id="file" accept="audio/*"/>
</form>

<script>

    const S3_BUCKET = `https://awazz.s3.amazonaws.com`;
    const file = document.getElementById('file')

    file.addEventListener('change', async ({ target }) => {


        const [file] = target.files;

        try {

            uploadToS3(file).then(res => {
             document.getElementById('path').value = res.location;
               document.getElementById('key').value = res.key;
            })

            // can you test on your end?

        } catch(e) {
            alert(`Someinthg went wrong ${JSON.stringify(e, null, 2)}`)
        }
    })
</script>

<script>
  /**
   * Signs and uploads file to S3 bucket
   * @param {File} file
   */
  async function uploadToS3(file) {
    if (!(file instanceof File)) {
      throw Error('file must be of a File instance')
    }

    // hashmap for keys
    const mapper = {
      Location: 'location',
      Bucket: 'bucket',
      ETag: 'eTag',
      Key: 'key',
    }

    // response holders
    let signatureRes
    let uploadResponse

    // Sign the file
    {
      const body = new FormData()
      body.append('file', file.name)

      signatureRes = await fetch('/sign-file', {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'POST',
        body,
      }).then(res => res.json())
    }

    // Start uploading to S3
    {
      const body = new FormData()
      for (let key in signatureRes) {
        body.append(key, signatureRes[key])
      }
      // AWS requires that file is appeneded
      body.append('file', file)

      uploadResponse = await fetch(S3_BUCKET, {
        method: 'POST',
        body,
      })
        .then(response => response.text())
        .then(str => {
          // Convert to DOM and select the response part
          const xml = new window.DOMParser().parseFromString(str, 'text/xml')
          const nodes = [...xml.querySelector('PostResponse').childNodes];
          // convert the array to object
          return nodes.reduce((acc, node) => ({
            ...acc,
            [mapper[node.nodeName]]: node.innerHTML,
          }), {})
        })
    }

    return uploadResponse
  }
</script>
@endcomponent
