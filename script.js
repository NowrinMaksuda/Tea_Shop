// ==========================
// Smooth Scroll for Navigation
// ==========================
const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
  link.addEventListener('click', function (e) {
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth' });
    }
  });
});

// ==========================
// Highlight Active Nav Link on Scroll
// ==========================
const sections = document.querySelectorAll('section');
const navLinksArr = Array.from(navLinks);

window.addEventListener('scroll', () => {
  let current = '';
  sections.forEach(section => {
    const sectionTop = section.offsetTop - 60; // 60px offset for header
    if (pageYOffset >= sectionTop) {
      current = section.getAttribute('id');
    }
  });

  navLinksArr.forEach(link => {
    link.classList.remove('active');
    if (link.getAttribute('href') === `#${current}`) {
      link.classList.add('active');
    }
  });
});

// ==========================
// Simple Contact Form Validation
// ==========================
const form = document.getElementById('contactForm');
const formMessage = document.getElementById('formMessage');

if (form) {
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    if (!name || !email || !message) {
      formMessage.textContent = 'Please fill in all fields.';
      formMessage.style.color = '#d32f2f';
      return;
    }

    formMessage.textContent = 'Thank you for contacting us, ' + name + '!';
    formMessage.style.color = '#388e3c';
    form.reset();
  });
}

// ==========================
// Modal Setup for Menu Item Details
// ==========================
const detailModal = document.createElement('div');
detailModal.id = 'detailModal';
detailModal.style.cssText = `
  position: fixed;
  top: 0; left: 0; width: 100%; height: 100%;
  background: rgba(0,0,0,0.7);
  display: flex;
  justify-content: center;
  align-items: center;
  visibility: hidden;
  opacity: 0;
  z-index: 9999;
  transition: opacity 0.3s;
`;
document.body.appendChild(detailModal);

const detailBody = document.createElement('div');
detailBody.style.cssText = `
  position: relative;
  background: #fffbe7;
  border-radius: 18px;
  padding: 2rem 1.5rem 1.5rem 1.5rem;
  width: 90%;
  max-width: 400px;
  max-height: 90%;
  overflow-y: auto;
  box-shadow: 0 8px 32px rgba(45,30,18,0.18);
`;
detailModal.appendChild(detailBody);

// Close Button
function closeModal() {
  detailModal.style.opacity = 0;
  setTimeout(() => {
    detailModal.style.visibility = 'hidden';
    detailBody.scrollTop = 0; // scroll top reset
  }, 300);
}

detailModal.addEventListener('click', e => {
  if (e.target === detailModal) closeModal();
});

// ==========================
// Menu Items Details Data
// ==========================
const menuDetails = {
  espresso: {
    title: 'Espresso',
    img: 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80',
    price: '$2.50',
    desc: 'Rich and bold, our classic espresso is the perfect pick-me-up for any time of day.',
    details: ['Intensity: Strong', 'Origin: Colombia'],
  },
  cappuccino: {
    title: 'Cappuccino',
    img: 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=800&q=80',
    price: '$3.00',
    desc: 'A creamy blend of espresso and steamed milk, topped with a cloud of foam.',
    details: ['Intensity: Medium', 'Origin: Brazil'],
  },
  latte: {
    title: 'Latte',
    img: 'https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=800&q=80',
    price: '$3.50',
    desc: 'Smooth espresso with steamed milk and a touch of foam for a mellow taste.',
    details: ['Intensity: Mild', 'Origin: Guatemala'],
  },
  mocha: {
    title: 'Mocha',
    img: 'https://images.unsplash.com/photo-1512568400610-62da28bc8a13?auto=format&fit=crop&w=800&q=80',
    price: '$3.75',
    desc: 'A delicious fusion of espresso, chocolate, and steamed milk, topped with whipped cream.',
    details: ['Intensity: Medium', 'Origin: Peru'],
  },
  hotChocolate: {
    title: 'Hot Chocolate',
    img: 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=800&q=80',
    price: '$3.60',
    desc: 'Rich & creamy chocolate drink, perfect for cozy evenings.',
    details: ['Rich & Creamy', 'Origin: Belgium'],
  },
  icedCoffee: {
    title: 'Iced Coffee',
    img: 'Images/iced coffee.jpeg',
    price: '$3.10',
    desc: 'Chilled coffee with ice for a refreshing boost.',
    details: ['Intensity: Smooth', 'Origin: Colombia'],
  },
  copycatAffogato: {
    title: 'Copycat Starbucks Affogate',
    img: 'Images/Copycat Starbucks Affogate.jpeg',
    price: '$3.10',
    desc: 'Delicious affogato inspired by Starbucks recipe.',
    details: ['Intensity: Smooth', 'Origin: Colombia'],
  },
  greenTea: {
    title: 'Green Tea',
    img: 'Images/Green tea.jpeg',
    price: '$2.00',
    desc: 'Light & refreshing, perfect for relaxation.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  greenMangoJuice: {
    title: 'Green Mangoes Juice',
    img: 'Images/Green Mangoes juice.jpeg',
    price: '$2.00',
    desc: 'Refreshing mango drink with tropical flavors.',
    details: ['Light & Refreshing', 'Origin: Bangladesh'],
  },
  strawberryPineappleJuice: {
    title: 'Strawberry Pineapple Juice',
    img: 'Images/Strawberry Pineapple Juice.jpeg',
    price: '$2.00',
    desc: 'Sweet and tangy blend of strawberry and pineapple.',
    details: ['Light & Refreshing', 'Origin: Malaysia'],
  },
  mangoJuice: {
    title: 'Mango Juice',
    img: 'Images/Mango juice.jpeg',
    price: '$2.00',
    desc: 'Classic tropical mango juice, freshly served.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  pinertest: {
    title: 'Pinertest',
    img: 'Images/Pinertest.jpeg',
    price: '$2.00',
    desc: 'Special fruity drink with pineapple twist.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  saltedCaramel: {
    title: 'Salted Caramel',
    img: 'Images/Salted Caramel.jpeg',
    price: '$2.00',
    desc: 'Sweet and salty caramel treat.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  icedCaramel: {
    title: 'Iced Caramel',
    img: 'Images/Pineapple & Berry Smoothie.png',
    price: '$2.00',
    desc: 'Chilled caramel drink with fruity notes.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  spicesGreenTea: {
    title: 'Spices Green Tea',
    img: 'Images/Spices Green tea.jpeg',
    price: '$2.00',
    desc: 'Aromatic spiced green tea for cozy moments.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  sugarFreeCaramel: {
    title: 'Sugar-Free Caramel',
    img: 'Images/Sugar-Free Caramel.jpeg',
    price: '$2.00',
    desc: 'Healthy sugar-free caramel drink.',
    details: ['Light & Refreshing', 'Origin: Japan'],
  },
  masalaChai: {
    title: 'Masala Chai',
    img: 'https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=800&q=80',
    price: '$2.25',
    desc: 'Strong and spicy traditional Indian tea.',
    details: ['Strong & Spicy', 'Origin: India'],
  },
  herbalTea: {
    title: 'Herbal Tea',
    img: 'https://images.unsplash.com/photo-1542382257-80dedb725088?auto=format&fit=crop&w=800&q=80',
    price: '$2.75',
    desc: 'Mild and refreshing herbal infusion.',
    details: ['Mild & Refreshing', 'Origin: Morocco'],
  },
  lemonTea: {
    title: 'Lemon Tea',
    img: 'images/lemon Tea.jpeg',
    price: '$2.40',
    desc: 'Refreshing citrus flavored tea.',
    details: ['Refreshing Citrus', 'Origin: Sri Lanka'],
  },
  honeyLemonTea: {
    title: 'Honey Lemon Tea',
    img: 'Images/Honey Lemon tea.jpeg',
    price: '$3.00',
    desc: 'Sweet and tangy honey lemon tea.',
    details: ['Refreshing Citrus', 'Origin: South Korea'],
  },
  matchaLatte: {
    title: 'Matcha Latte',
    img: 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?auto=format&fit=crop&w=800&q=80',
    price: '$3.80',
    desc: 'Light and creamy matcha latte.',
    details: ['Light & Creamy', 'Origin: Japan'],
  },
  lemonade: {
    title: 'Lemonade',
    img: 'Images/Lemonda.jpeg',
    price: '$2.95',
    desc: 'Freshly squeezed lemonade, perfect for summer.',
    details: ['Freshly Squeezed', 'Summer Special'],
  },
  strawberrySmoothie: {
    title: 'Strawberry Smoothie',
    img: 'images/Strawberry Smoothie.jpeg',
    price: '$4.20',
    desc: 'Sweet and fruity smoothie with fresh strawberries.',
    details: ['Sweet & Fruity', 'Fresh Strawberries'],
  },
  mojito: {
    title: 'Mojito',
    img: 'https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=800&q=80',
    price: '$3.90',
    desc: 'Minty fresh classic mocktail.',
    details: ['Minty Fresh', 'Classic Mocktail'],
  },
};

// ==========================
// Show Modal on Menu Item Click
// ==========================
const menuItems = document.querySelectorAll('.menu-item');

menuItems.forEach(item => {
  item.addEventListener('click', () => {
    const title = item.querySelector('h3').textContent;
    const key = Object.keys(menuDetails).find(
      k => menuDetails[k].title === title
    );

    if (key) {
      const data = menuDetails[key];
      detailBody.innerHTML = `
        <button style="position:absolute;top:10px;right:14px;background:none;border:none;font-size:2rem;color:#ffb300;cursor:pointer;">×</button>
        <img src="${data.img}" alt="${
        data.title
      }" style="width:100%;border-radius:10px;margin-bottom:1rem;">
        <h2 style="margin:0 0 0.5rem 0;font-family:'Pacifico',cursive;color:#ffb300;">${
          data.title
        }</h2>
        <div style="font-size:1.1rem;font-weight:bold;color:#2d1e12;margin-bottom:0.5rem;">${
          data.price
        }</div>
        <div style="color:#6f4e37;margin-bottom:0.7rem;">${data.desc}</div>
        <ul style="padding-left:1.1em;margin:0 0 0.5rem 0;color:#8d6742;">
          ${data.details.map(d => `<li>${d}</li>`).join('')}
        </ul>
      `;

      // Close button inside modal
      detailBody.querySelector('button').addEventListener('click', closeModal);

      detailModal.style.visibility = 'visible';
      detailModal.style.opacity = 1;
    }
  });
});
