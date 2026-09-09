    const CELL = 20, W = 400 / CELL, H = 400 / CELL;
    const canvas = document.getElementById('gc');
    const ctx = canvas.getContext('2d');
    const overlay = document.getElementById('overlay');
    const btn = document.getElementById('btn-start');
    const scoreEl = document.getElementById('score-disp');
    const hiEl = document.getElementById('hi-disp');

    let snake, dir, nextDir, food, score, hi = 0, running, timer;

    function rnd(n) { return Math.floor(Math.random() * n); }

    function newFood() {
      let f;
      do { f = { x: rnd(W), y: rnd(H) }; }
      while (snake.some(s => s.x === f.x && s.y === f.y));
      return f;
    }

    function init() {
      snake = [{ x: 10, y: 10 }, { x: 9, y: 10 }, { x: 8, y: 10 }];
      dir = { x: 1, y: 0 };
      nextDir = { x: 1, y: 0 };
      food = newFood();
      score = 0;
      scoreEl.textContent = 0;
      hiEl.textContent = hi;
    }

    function step() {
      dir = nextDir;
      const head = { x: snake[0].x + dir.x, y: snake[0].y + dir.y };

      // Collision check: wall or self
      if (head.x < 0 || head.x >= W || head.y < 0 || head.y >= H || snake.some(s => s.x === head.x && s.y === head.y)) {
        endGame(); return;
      }

      snake.unshift(head);

      // Eat food
      if (head.x === food.x && head.y === food.y) {
        score += 10;
        if (score > hi) hi = score;
        food = newFood();
        scoreEl.textContent = score;
        hiEl.textContent = hi;
      } else {
        snake.pop(); 
      }

      draw();
      timer = setTimeout(step, 150);
    }

    function draw() {
      // Background
      ctx.fillStyle = '#0a0f0a';
      ctx.fillRect(0, 0, 400, 400);

      // Grid lines
      ctx.strokeStyle = '#0d140d';
      ctx.lineWidth = 0.5;
      for (let x = 0; x < W; x++)
        for (let y = 0; y < H; y++)
          ctx.strokeRect(x * CELL, y * CELL, CELL, CELL);

      // Snake body
      snake.forEach((s, i) => {
        const t = 1 - i / snake.length;
        const g = Math.round(120 + t * 110);
        ctx.fillStyle = i === 0 ? '#4ade80' : `rgb(20,${g},40)`;
        ctx.shadowColor = i === 0 ? '#4ade80' : 'transparent';
        ctx.shadowBlur = i === 0 ? 8 : 0;
        ctx.beginPath();
        ctx.roundRect(s.x * CELL + 1, s.y * CELL + 1, CELL - 2, CELL - 2, 3);
        ctx.fill();
      });
      ctx.shadowBlur = 0;

      const pulse = 0.7 + 0.3 * Math.sin(Date.now() / 300);
      ctx.fillStyle = `rgba(248,113,113,${pulse})`;
      ctx.shadowColor = '#f87171';
      ctx.shadowBlur = 14;
      ctx.beginPath();
      ctx.arc(food.x * CELL + CELL / 2, food.y * CELL + CELL / 2, CELL / 2 - 2, 0, Math.PI * 2);
      ctx.fill();
      ctx.shadowBlur = 0;
    }

    function endGame() {
      running = false;
      clearTimeout(timer);
      if (score > hi) hi = score;
      overlay.innerHTML = `
        <h2 style="color:#f87171;text-shadow:0 0 12px #f8717188">GAME OVER</h2>
        <p style="color:#fca5a5">SKOR KAMU: ${score}<br>REKOR TERTINGGI: ${hi}</p>
        <button id="btn-start" style="background:#4ade80;color:#0a0f0a;border:none;padding:12px 24px;font-family:'Press Start 2P',monospace;font-size:9px;border-radius:6px;cursor:pointer;margin-top:4px">MAIN LAGI</button>
      `;
      overlay.style.display = 'flex';
      document.getElementById('btn-start').addEventListener('click', startGame);
    }

    function startGame() {
      overlay.style.display = 'none';
      init();
      running = true;
      clearTimeout(timer);
      step();
    }

    // Direction map
    const DIRS = {
      UP: { x: 0, y: -1 }, DOWN: { x: 0, y: 1 },
      LEFT: { x: -1, y: 0 }, RIGHT: { x: 1, y: 0 }
    };

    document.addEventListener('keydown', e => {
      const map = {
        ArrowUp: 'UP', ArrowDown: 'DOWN', ArrowLeft: 'LEFT', ArrowRight: 'RIGHT',
        w: 'UP', s: 'DOWN', a: 'LEFT', d: 'RIGHT',
        W: 'UP', S: 'DOWN', A: 'LEFT', D: 'RIGHT'
      };
      const d = map[e.key];
      if (d) {
        e.preventDefault(); 
        const nd = DIRS[d];
        // Prevent reversing direction
        if (nd.x !== -dir.x || nd.y !== -dir.y) nextDir = nd;
      }
    });

    btn.addEventListener('click', startGame);

    draw();