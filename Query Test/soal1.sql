SELECT
activities.title,
activity_details.type,
SUM(activity_details.weight)
FROM
activity_details
LEFT JOIN
activities
ON
activities.id = activity_details.id_activity
GROUP BY activities.title, activity_details.type;