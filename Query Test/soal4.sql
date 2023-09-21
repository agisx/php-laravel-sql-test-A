SELECT
activities.title,
type,
weight
FROM activity_details
JOIN
(
SELECT
MAX(id) as max_id
FROM activity_details
GROUP BY activity_details.id_activity
) AS LASTEST ON LASTEST.max_id = activity_details.id
JOIN
activities ON activities.id = activity_details.id_activity;