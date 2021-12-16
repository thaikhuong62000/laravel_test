INSERT INTO footballs (id, name, time)
VALUES
  (3, 'Trung Quốc vs Việt Nam', '2021-10-07 01:00:00'),
  (4, 'Oman vs Việt Nam', '2021-10-12 23:00:00'),
  (5, 'Việt Nam vs Nhật Bản', '2021-11-11 19:00:00'),
  (6, 'Việt Nam vs Saudi Arabia', '2021-11-16 19:00:00');

INSERT INTO footballs (id, name, time)
VALUES
  (7, 'Trung Quốc vs Việt Nam', '2021-09-13 01:00:00');

DELETE FROM footballs
WHERE id=7;