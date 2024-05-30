document.addEventListener("DOMContentLoaded", function () {
    const generateBtn = document.getElementById('generateBTN')
    const palette = document.getElementById('palette')

    // a function to generate a random color 
    function getRandomColor() {
        const letters = '0123456789ABCDEF'
        let color = '#'
        
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)]
        }

        return color
    }

    // a function to generate the color palette
    function generateColors() {
        palette.innerHTML = "" // clear the palette

        for (let i = 0; i < 5; i++) {
            const color = getRandomColor()
            const colorBox = document.createElement('div') 

            colorBox.className = "color-box" 
            colorBox.style.backgroundColor = color
            colorBox.textContent = color

            colorBox.addEventListener('click', function () {
                copyToClipboard(color) 
                alert(`Copied ${color} to clipboard`)
            })
            palette.appendChild(colorBox)
        }
    }

    // a function 
    function copyToClipboard(text) {
        const TextArea = document.createElement('textarea')
        TextArea.value = text
        document.body.appendChild(TextArea)
        TextArea.select()
        document.execCommand("copy")
        document.body.removeChild(TextArea)
    }

    // Event listener for generate button 
    generateBtn.addEventListener('click', generateColors)

    // initial color generation 
    generateColors()

})